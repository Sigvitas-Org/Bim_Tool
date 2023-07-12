<?php

namespace Modules\Recruit\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Modules\Recruit\Entities\RecruitInterviewSchedule;

class HostInterview extends Notification
{
    use Queueable;
    private $interviewSchedule;
    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public function __construct(RecruitInterviewSchedule $interviewSchedule)
    {
        $this->interviewSchedule = $interviewSchedule;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        $via = ['database'];

        if ($notifiable->email) {
            array_push($via, 'mail');
        }

        return $via;
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $emailContent = (new MailMessage)
            ->subject(__('recruit::modules.email.subject'))
            ->greeting(__('email.hello').' ' . ucwords($notifiable->name) . '!')
            ->line(__('recruit::modules.email.hostText').' '.__($this->interviewSchedule->jobApplication->full_name))

            ->line(__('recruit::modules.email.for').' - ' . ucwords($this->interviewSchedule->jobApplication->job->title).' '.__('recruit::modules.email.hasBeenSchedule'))
            ->line(__('recruit::modules.email.atDate').' '. $this->interviewSchedule->schedule_date->format('M d, Y h:i a'))
            ->action(__('recruit::modules.email.response').' '.__('recruit::modules.email.loginDashboard'), url('/login'));

        if ($notifiable->id == $this->interviewSchedule->meeting->created_by) {
            $emailContent = $emailContent->line(__('recruit::modules.interviewSchedule.meetingPassword') . ' - ' . $this->interviewSchedule->meeting->password);
            $emailContent = $emailContent->action(__('recruit::modules.interviewSchedule.startUrl'), url($this->interviewSchedule->meeting->start_link));
        }

        $emailContent = $emailContent->line(__('recruit::modules.email.thankyouNote'));
        return $emailContent;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'user_id' => $notifiable->id,
            'interview_id' => $this->interviewSchedule->id,
            'heading' => $this->interviewSchedule->jobApplication->job->title
        ];
    }
    
}
