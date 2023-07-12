<?php

namespace Modules\Recruit\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Modules\Recruit\Entities\RecruitJobApplication;
use Modules\Recruit\Entities\RecruitApplicationStatus;

class JobApplicationStatusChange extends Notification implements ShouldQueue
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
        $via = [];

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
        $recruitStatus = RecruitApplicationStatus::find($notifiable->status_id);

        $emailContent = (new MailMessage)
            ->subject(__('recruit::messages.statusSubject'))
            ->greeting(__('email.hello').' ' . ucwords($notifiable->full_name) . '!')
            ->line(__('recruit::messages.applicationStatus').' ' . ucwords($recruitStatus->status));

        $emailContent = $emailContent->line(__('email.thankyouNote'));
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
            'data' => $this->jobApplication->toArray()
        ];
    }
    
}
