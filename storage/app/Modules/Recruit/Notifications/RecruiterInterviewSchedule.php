<?php

namespace Modules\Recruit\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Modules\Recruit\Entities\RecruitInterviewSchedule;

class RecruiterInterviewSchedule extends Notification implements ShouldQueue
{
    use Queueable;
    private $interview;
    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public function __construct(RecruitInterviewSchedule $interview)
    {
        $this->interview = $interview;
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
            ->line(__($this->interview->jobApplication->full_name).' '.__('recruit::modules.email.text').' - ' . ucwords($this->interview->jobApplication->job->title));

        if ($this->interview->interview_type == 'in person') {
            $emailContent = $emailContent->line(__('recruit::modules.interviewSchedule.interviewType').' - ' . __('recruit::app.interviewSchedule.inPerson'));
        }
        elseif ($this->interview->interview_type == 'video') {
            if ($this->interview->video_type == 'zoom') {
                $emailContent = $emailContent->line(__('recruit::modules.interviewSchedule.interviewType').' - ' . __('recruit::app.interviewSchedule.zoom'));
            }
            else {
                $emailContent = $emailContent->line(__('recruit::modules.interviewSchedule.interviewType').' - ' . ucwords($this->interview->other_link));
            }
        } elseif ($this->interview->interview_type == 'phone') {
            $emailContent = $emailContent->line(__('recruit::modules.interviewSchedule.interviewType').' - ' . ucwords($this->interview->phone));
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
    public function toArray()
    {
        return [
            'user_id' => $this->interview->jobApplication->job->recruiter_id,
            'interview_id' => $this->interview->id,
            'heading' => $this->interview->jobApplication->full_name
        ];
    }
    
}
