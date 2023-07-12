<?php

namespace App\Notifications;

use App\Models\Discussion;
use App\Models\EmailNotificationSetting;
use Illuminate\Notifications\Messages\SlackMessage;
use NotificationChannels\OneSignal\OneSignalChannel;
use NotificationChannels\OneSignal\OneSignalMessage;

class NewDiscussion extends BaseNotification
{


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private $discussion;
    private $emailSetting;

    public function __construct(Discussion $discussion)
    {
        $this->discussion = $discussion;
        $this->company = $this->discussion->company;
        $this->emailSetting = EmailNotificationSetting::where('company_id', $this->company->id)->where('slug', 'discussion-reply')->first();
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
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = route('discussion.show', $this->discussion->id);
        $url = getDomainSpecificUrl($url, $this->company);

        return parent::build()
            ->subject(__('email.discussion.subject') . $this->discussion->title . ' - ' . config('app.name') . '.')
            ->greeting(__('email.hello') . ' ' . mb_ucwords($notifiable->name) . ',')
            ->line(__('email.discussion.subject') . ' ' . $this->discussion->title . ':-')
            ->action(__('email.discussion.action'), $url)
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
            'id' => $this->discussion->id,
            'title' => $this->discussion->title,
            'project_id' => $this->discussion->project_id,
            'user' => $this->discussion->user->name
        ];
    }

    /**
     * Get the Slack representation of the notification.
     *
     * @param mixed $notifiable
     * @return SlackMessage
     */
    public function toSlack($notifiable)
    {
        $slack = $notifiable->company->slackSetting;

        if (count($notifiable->employee) > 0 && (!is_null($notifiable->employee[0]->slack_username) && ($notifiable->employee[0]->slack_username != ''))) {
            return (new SlackMessage())
                ->from(config('app.name'))
                ->image($slack->slack_logo_url)
                ->to('@' . $notifiable->employee[0]->slack_username)
                ->content('*' . __('email.discussion.subject') . '*' . "\n" . $this->discussion->title);
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
            ->subject(__('email.discussion.subject'))
            ->body(ucfirst($this->discussion->title));
    }

}
