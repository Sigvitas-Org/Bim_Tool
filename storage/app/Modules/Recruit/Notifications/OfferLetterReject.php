<?php

namespace Modules\Recruit\Notifications;

use Illuminate\Bus\Queueable;
use Modules\Recruit\Entities\RecruitJob;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Modules\Recruit\Entities\RecruitJobApplication;

class OfferLetterReject extends Notification implements ShouldQueue
{
    use Queueable;
    private $jobApplication;
    private $job;
    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public function __construct(RecruitJob $job, RecruitJobApplication $jobApplication)
    {
        $this->job = $job;
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
        return (new MailMessage)
            ->subject(__('recruit::modules.offerReject.subject'))
            ->greeting(__('email.hello') . ' ' . ucwords($notifiable->full_name) . '!')
            ->line(__('recruit::modules.offerReject.text') . ' - ' . ucwords($this->job->title))
            ->line(__('email.thankyouNote'));
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
