<?php

namespace Modules\Recruit\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RemoveJobRecruiter extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    private $job;

    public function __construct($job)
    {
        $this->job = $job;
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
            ->subject(__('recruit::modules.updateJob.subject'))
            ->greeting(__('email.hello') . ' ' . ucwords($notifiable->name) . '!')
            ->line(__('recruit::modules.updateJob.text') . ' - ' . ucwords($this->job['title']))
            ->action(__('recruit::modules.newJob.viewJob'), route('jobs.index'));
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
            'job_id' => $this->job->id,
            'heading' => $this->job->title
        ];
    }
    
}
