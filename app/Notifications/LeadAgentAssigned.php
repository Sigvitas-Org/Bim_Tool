<?php

namespace App\Notifications;

use App\Models\EmailNotificationSetting;
use App\Models\Lead;

class LeadAgentAssigned extends BaseNotification
{

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private $lead;
    private $emailSetting;

    public function __construct(Lead $lead)
    {
        $this->lead = $lead;
        $this->company = $this->lead->company;
        $this->emailSetting = EmailNotificationSetting::where('company_id', $this->company->id)->where('slug', 'lead-notification')->first();
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        $via = array('database');

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
        $url = route('leads.show', $this->lead->id);
        $url = getDomainSpecificUrl($url, $this->company);

        return parent::build()
            ->subject(__('email.leadAgent.subject') . ' - ' . config('app.name'))
            ->greeting(__('email.hello') . ' ' . mb_ucwords($notifiable->name) . '!')
            ->line(__('email.leadAgent.subject'))
            ->line(__('modules.lead.leadDetails') . ':- ')
            ->line(__('modules.lead.clientName') . ': ' . $this->lead->client_name)
            ->action(__('email.leadAgent.action'), $url)
            ->line(__('email.thankyouNote'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    //phpcs:ignore
    public function toArray($notifiable)
    {
        return [
            'id' => $this->lead->id,
            'name' => $this->lead->client_name,
            'agent_id' => $notifiable->id,
            'added_by' => $this->lead->added_by
        ];
    }

}
