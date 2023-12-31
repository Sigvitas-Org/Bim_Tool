<?php

namespace App\Notifications;

use App\Models\EmailNotificationSetting;
use App\Models\Task;
use Illuminate\Notifications\Messages\SlackMessage;
use NotificationChannels\OneSignal\OneSignalChannel;
use NotificationChannels\OneSignal\OneSignalMessage;

class TaskReminder extends BaseNotification
{

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private $task;
    private $emailSetting;

    public function __construct(Task $task)
    {

        $this->task = $task;
        $this->emailSetting = EmailNotificationSetting::userAssignTask();
        $this->company = $this->task->company;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        $via = array();

        if ($notifiable->email_notifications && $notifiable->email != '') {
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
        $url = route('front.task_detail', [$this->task->hash]);

        $url = getDomainSpecificUrl($url, $this->company);

        $content = ucfirst($this->task->heading) . ' #' . $this->task->task_short_code . '<p>';

        if ($this->task->due_date) {
            $content .= '<b style="color: green">' . __('app.dueDate') . ' : ' . $this->task->due_date->format($this->company->date_format) . '</b>
            </p>';
        }

        return parent::build()
            ->subject(__('email.reminder.subject') . ' #' . $this->task->task_short_code . ' - ' . config('app.name') . '.')
            ->greeting(__('email.hello') . ' ' . mb_ucwords($notifiable->name) . ',')
            ->markdown('mail.task.reminder', ['url' => $url, 'content' => $content]);
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
            'id' => $this->task->id,
            'created_at' => $this->task->created_at->format('Y-m-d H:i:s'),
            'heading' => $this->task->heading
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

        $dueDate = (!is_null($this->task->due_date)) ? $this->task->due_date->format($this->company->date_format) : null;

        $message = (new SlackMessage())->from(config('app.name'))->image($slack->slack_logo_url);

        if (count($notifiable->employee) > 0 && (!is_null($notifiable->employee[0]->slack_username) && ($notifiable->employee[0]->slack_username != ''))) {
            return $message->to('@' . $notifiable->employee[0]->slack_username)
                ->content('*' . __('email.reminder.subject') . '*' . "\n" . ucfirst($this->task->heading) . "\n" . ' #' . $this->task->task_short_code . "\n" . __('app.dueDate') . ': ' . $dueDate);
        }

        return $message->content('This is a redirected notification. Add slack username for *' . mb_ucwords($notifiable->name) . '*');
    }

    // phpcs:ignore
    public function toOneSignal($notifiable)
    {
        return OneSignalMessage::create()
            ->subject(__('email.reminder.subject'))
            ->body($this->task->heading . ' #' . $this->task->task_short_code);
    }

}
