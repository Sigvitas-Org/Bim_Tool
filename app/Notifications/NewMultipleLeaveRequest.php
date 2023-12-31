<?php

namespace App\Notifications;

use App\Models\EmailNotificationSetting;
use App\Models\Leave;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\OneSignal\OneSignalChannel;
use NotificationChannels\OneSignal\OneSignalMessage;

class NewMultipleLeaveRequest extends BaseNotification
{


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private $leave;
    private $multiDates;
    private $emailSetting;

    public function __construct(Leave $leave, $multiDates)
    {
        $this->leave = $leave;
        $this->multiDates = $multiDates;
        $this->company = $this->leave->company;
        $this->emailSetting = EmailNotificationSetting::where('company_id', $this->company->id)->where('slug', 'new-leave-application')->first();
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

        if ($this->emailSetting->send_email == 'yes' && $notifiable->email_notifications && $notifiable->email != '') {
            array_push($via, 'mail');
        }

        if ($this->emailSetting->send_slack == 'yes' && $this->company->slackSetting->status == 'active') {
            array_push($via, 'slack');
        }

        if ($this->emailSetting->send_push == 'yes') {
            array_push($via, OneSignalChannel::class);
        }

        return $via;
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable): MailMessage
    {
        $user = $notifiable;
        $dates = explode(',', $this->multiDates);
        $emailDate = '';

        foreach ($dates as $key => $date) {
            $emailDate .= ($key + 1) . '. ' . $date . '<br>';
        }

        $content = __('email.leaves.subject') . ' ' . __('app.from') . ' ' . mb_ucwords($this->leave->user->name) . '.' . '<p><b>' . __('modules.leaves.leaveType') . ':</b> ' . $this->leave->type->type_name . '</p><p><b>' . __('modules.leaves.reason') . '</b></p><p>' . $this->leave->reason . '</p><p><b>' . __('app.leaveDate') . '</b></p><p>' . $emailDate . '</p>';

        return parent::build()
            ->subject(__('email.leaves.subject') . ' - ' . config('app.name'))
            ->greeting(__('email.hello') . ' ' . mb_ucwords($user->name) . '!')
            ->markdown('mail.leaves.multiple', ['content' => $content]);
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
            'id' => $this->leave->id,
            'user_id' => $this->leave->user->id,
            'user' => $this->leave->user
        ];
    }

    public function toSlack($notifiable)
    {
        $slack = $notifiable->company->slackSetting;

        if (count($notifiable->employee) > 0 && (!is_null($notifiable->employee[0]->slack_username) && ($notifiable->employee[0]->slack_username != ''))) {
            return (new SlackMessage())
                ->from(config('app.name'))
                ->image($slack->slack_logo_url)
                ->to('@' . $notifiable->employee[0]->slack_username)
                ->content(__('email.leaves.subject') . "\n" . mb_ucwords($this->leave->user->name) . "\n" . '*' . __('app.date') . '*: ' . $this->leave->leave_date->format($this->company->date_format) . "\n" . '*' . __('modules.leaves.leaveType') . '*: ' . $this->leave->type->type_name . "\n" . '*' . __('modules.leaves.reason') . '*' . "\n" . $this->leave->reason);
        }

        return (new SlackMessage())
            ->from(config('app.name'))
            ->image($slack->slack_logo_url)
            ->content('This is a redirected notification. Add slack username for *' . mb_ucwords($notifiable->name) . '*');
    }

    // phpcs:ignore
    public function toOneSignal($notifiable)
    {
        return OneSignalMessage::create()
            ->subject(__('email.leaves.subject'))
            ->body('by ' . mb_ucwords($this->leave->user->name));
    }

}
