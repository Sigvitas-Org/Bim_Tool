<?php

namespace Modules\Recruit\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Modules\Recruit\Entities\RecruitEmailNotificationSetting;
use Modules\Recruit\Entities\RecruitJobOfferLetter;

class AdminNewOfferLetter extends Notification implements ShouldQueue
{
    use Queueable;
    private $offer;
    private $emailSetting;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(RecruitJobOfferLetter $offer)
    {
        $this->offer = $offer;
        $this->emailSetting = RecruitEmailNotificationSetting::where('slug', 'new-offer-letteradded-by-admin')->first();
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

        if ($this->emailSetting->send_email == 'yes' && $notifiable->email_notifications && $notifiable->email != '') {
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
            ->line(__($this->offer->jobApplication->full_name) . ' (' . $this->offer->jobApplication->email ? $this->offer->jobApplication->email : '' . ') - '  . __('recruit::modules.offerLetter.text') . ' ' . ucwords($this->offer->job->title));
        $emailContent = $emailContent->line(__('email.thankyouNote'));
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
        $this->recruiter = RecruitJobOfferLetter::with('user')->where('id', $this->offer->id)->first();

        return [
            'user_id' => $notifiable->id,
            'offer_id' => $this->offer->id,
            'heading' => $this->offer->jobApplication->full_name,
            'user_image' => $this->recruiter->user->image_url
        ];
    }

}