<?php

namespace Modules\Recruit\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Modules\Recruit\Entities\RecruitJobApplication;

class RecruiterJobApplicationStatusChanged extends Notification implements ShouldQueue
{
    use Queueable;
    public $jobApplication;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(RecruitJobApplication $jobApplication)
    {
        $this->jobApplication = $jobApplication;
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
        return (new MailMessage)
            ->subject(__('recruit::modules.recruiterJobApplicationStatusChange.subject'))
            ->greeting(__('email.hello') . ' ' . ucwords($notifiable->name) . '!')
            ->line(__($this->jobApplication->full_name) . ' (' . $this->jobApplication->email ? $this->jobApplication->email : '' . ') - '  . __('recruit::modules.recruiterJobApplicationStatusChange.text') .' '. ucwords($this->jobApplication->applicationStatus->status))
            ->action(__('recruit::modules.email.loginDashboard'), url('/login'));
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
            'job_id' => $this->jobApplication->id,
            'heading' => $this->jobApplication->full_name
        ];
    }
    
}
