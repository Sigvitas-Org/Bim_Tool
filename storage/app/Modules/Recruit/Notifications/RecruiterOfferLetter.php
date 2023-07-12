<?php

namespace Modules\Recruit\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Modules\Recruit\Entities\RecruitJobOfferLetter;

class RecruiterOfferLetter extends Notification implements ShouldQueue
{
    use Queueable;
    private $offer;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(RecruitJobOfferLetter $offer)
    {
        $this->offer = $offer;
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
            ->subject(__('recruit::modules.offerLetter.subject'))
            ->greeting(__('email.hello'). ' ' . ucwords($notifiable->name) . '!')
            ->line(__($this->offer->jobApplication->full_name) . ' (' . $this->offer->jobApplication->email ? $this->offer->jobApplication->email : ''  . ') - '  . __('recruit::modules.offerLetter.text') . ' ' . ucwords($this->offer->job->title));
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
            'user_id' => $this->offer->job->recruiter_id,
            'offer_id' => $this->offer->id,
            'heading' => $this->offer->jobApplication->full_name
        ];
    }
    
}
