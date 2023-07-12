<?php

namespace Modules\Recruit\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Modules\Recruit\Entities\RecruitJobOfferLetter;

class JobOfferStatusChange extends Notification implements ShouldQueue
{
    use Queueable;
    private $jobOffer;
    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public function __construct(RecruitJobOfferLetter $jobOffer)
    {
        $this->jobOffer = $jobOffer;
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
        $status = ($this->jobOffer->status == 'accept') ? 'accepted' : 'declined';
        $emailContent = (new MailMessage)
            ->subject(__('recruit::modules.email.jobOffer'))
            ->greeting(__('email.hello').' ' . ucwords($notifiable->name) . '!')
            ->line(__($this->jobOffer->jobApplication->full_name).' '.$status.' '.__('recruit::modules.message.jobOfferStatus'));

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
            'offer_id' => $this->jobOffer->id,
            'heading' => $this->jobOffer->jobApplication->full_name
        ];
    }
    
}
