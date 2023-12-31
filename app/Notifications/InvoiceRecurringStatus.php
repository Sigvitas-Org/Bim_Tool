<?php

namespace App\Notifications;

use App\Models\EmailNotificationSetting;
use App\Models\RecurringInvoice;

class InvoiceRecurringStatus extends BaseNotification
{

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private $invoice;
    private $emailSetting;

    public function __construct(RecurringInvoice $invoice)
    {
        $this->invoice = $invoice;
        $this->company = $this->invoice->company;
        $this->emailSetting = EmailNotificationSetting::where('company_id', $this->company->id)->where('slug', 'invoice-createupdate-notification')->first();
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
        $url = route('invoice-recurring.show', $this->invoice->id);
        $url = getDomainSpecificUrl($url, $this->company);

        return parent::build()
            ->subject(__('email.invoiceRecurringStatus.subject') . ' - ' . config('app.name'))
            ->greeting(__('email.hello') . ' ' . mb_ucwords($notifiable->name) . '!')
            ->line(__('email.invoiceRecurringStatus.text') . ' ' . $this->invoice->status . '.')
            ->action(__('email.invoiceRecurringStatus.action'), $url)
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
        return $this->invoice->toArray();
    }

}
