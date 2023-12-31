<?php

namespace App\Notifications;

use App\Models\EmailNotificationSetting;
use App\Models\SubTask;
use Illuminate\Notifications\Messages\MailMessage;

class SubTaskAssigneeAdded extends BaseNotification
{


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private $subTask;
    private $emailSetting;

    public function __construct(SubTask $subTask)
    {
        $this->subTask = $subTask;
        $this->company = $this->subTask->task->company;
        $this->emailSetting = EmailNotificationSetting::where('company_id', $this->company->id)->where('slug', 'user-assign-to-task')->first();
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    //phpcs:ignore
    public function via($notifiable)
    {
        $via = ['database'];

        if ($this->emailSetting->send_email == 'yes' && $notifiable->email_notifications && $notifiable->email != '') {
            array_push($via, 'mail');
        }

        return $via;
    }

    public function toMail($notifiable): MailMessage
    {
        $url = route('tasks.show', [$this->subTask->task->id, 'view' => 'sub_task']);
        $url = getDomainSpecificUrl($url, $this->company);

        return parent::build()
            ->subject(__('email.subTaskAssigneeAdded.subject') . ' - ' . config('app.name') . '.')
            ->greeting(__('email.hello') . ' ' . mb_ucwords($notifiable->name) . ',')
            ->line(ucfirst($this->subTask->title) . ' ' . __('email.subTaskAssigneeAdded.subject') . '.')
            ->line((!is_null($this->subTask->task->project)) ? __('app.project') . ' - ' . ucfirst($this->subTask->task->project->project_name) : '')
            ->action(__('email.subTaskAssigneeAdded.action'), $url)
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
            'id' => $this->subTask->task->id,
            'created_at' => $this->subTask->created_at->format('Y-m-d H:i:s'),
            'heading' => $this->subTask->title
        ];
    }

}
