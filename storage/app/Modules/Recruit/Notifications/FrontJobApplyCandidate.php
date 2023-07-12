<?php

namespace Modules\Recruit\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Modules\Recruit\Entities\RecruitJobApplication;

class FrontJobApplyCandidate extends Notification implements ShouldQueue
{
    use Queueable;
    private $jobApplication;
    private $job;
    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public function __construct(RecruitJobApplication $jobApplication, $job)
    {
        $this->jobApplication = $jobApplication;
        $this->job = $job;
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
        $emailContent = (new MailMessage)
            ->subject(__('recruit::modules.jobApplication.jobApplication'))
            ->greeting(__('email.hello').' ' . ucwords($notifiable->full_name) . '!');

        $emailContent = $emailContent->line(__('recruit::messages.successApply'));

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
            'data' => $this->jobApplication->toArray()
        ];
    }
    
}
