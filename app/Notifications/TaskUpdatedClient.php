<?php

namespace App\Notifications;

use App\Models\EmailNotificationSetting;
use App\Models\Task;

class TaskUpdatedClient extends BaseNotification
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
        $url = route('tasks.show', $this->task->id);
        $url = getDomainSpecificUrl($url, $this->company);

        return parent::build()
            ->subject(__('email.taskUpdate.subject') . ' - ' . config('app.name') . '.')
            ->greeting(__('email.hello') . ' ' . mb_ucwords($notifiable->name) . ',')
            ->line(ucfirst($this->task->heading) . ' ' . __('email.taskUpdate.subject') . '.')
            ->action(__('email.taskUpdate.action'), $url)
            ->line(__('email.thankyouNote'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'id' => $this->task->id,
            'updated_at' => $this->task->updated_at->format('Y-m-d H:i:s'),
            'created_at' => $this->task->created_at->format('Y-m-d H:i:s'),
            'heading' => $this->task->heading
        ];
    }

}
