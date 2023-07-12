<?php

namespace Modules\Recruit\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Modules\Recruit\Entities\RecruitJobApplication;

class UpdateJobApplication extends Notification implements ShouldQueue
{
    use Queueable;
    private $jobApplication;
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
            ->subject(__('recruit::modules.updateJobApplication.subject'))
            ->greeting(__('email.hello') . ' ' . ucwords($notifiable->name) . '!')
            ->line(__('recruit::modules.updateJobApplication.text') .' ' . __($this->jobApplication->full_name) . ' (' . $this->jobApplication->email ? $this->jobApplication->email : '' . ')  '  . __('recruit::modules.updateJobApplication.text2') .' - '. ucwords($this->jobApplication->job->title))
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
            'jobApp_id' => $this->jobApplication->id,
            'heading' => $this->jobApplication->full_name
        ];
    }
    
}
