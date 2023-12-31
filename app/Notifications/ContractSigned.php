<?php

namespace App\Notifications;

use App\Http\Controllers\ContractController;
use App\Models\Contract;
use App\Models\ContractSign;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\HtmlString;

class ContractSigned extends BaseNotification
{

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private $contract;
    private $contractSign;

    public function __construct(Contract $contract, ContractSign $contractSign)
    {
        $this->contract = $contract;
        $this->contractSign = $contractSign;
        $this->company = $this->contract->company;
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

        if ($notifiable->email_notifications && $notifiable->email != '') {
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

        $publicUrlController = new ContractController();
        $pdfOption = $publicUrlController->downloadView($this->contract->id);
        $pdf = $pdfOption['pdf'];
        $filename = $pdfOption['fileName'];

        return parent::build()
            ->subject(__('email.contractSign.subject'))
            ->greeting(__('email.hello') . ' ' . mb_ucwords($notifiable->name) . __('!'))
            ->line(new HtmlString(__('email.contractSign.text', ['contract' => '<strong>' . $this->contract->subject . '</strong>', 'client' => '<strong>' . $this->contractSign->full_name . '</strong>'])))
            ->line(__('email.thankyouNote'))
            ->attachData($pdf->output(), $filename . '.pdf');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */

    // phpcs:ignore
    public function toArray($notifiable)
    {
        return $this->contract->toArray();
    }

}
