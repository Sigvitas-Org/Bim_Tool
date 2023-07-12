<?php

namespace Modules\Recruit\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Modules\Recruit\Entities\RecruitJobOfferLetter;

class UpdateOfferLetter extends Notification implements ShouldQueue
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
        return (new MailMessage)
            ->subject(__('recruit::modules.updateOffer.subject'))
            ->greeting(__('email.hello') . ' ' . ucwords($notifiable->name) . '!')
            ->line(__($this->offer->jobApplication->full_name) . ' (' . $this->offer->jobApplication->email ? $this->offer->jobApplication->email : '' . ') - '  . __('recruit::modules.updateOffer.text') . ' ' . ucwords($this->offer->job->title))
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
            'offer_id' => $this->offer->id,
            'heading' => $this->offer->jobApplication->full_name
        ];
    }
    
}
