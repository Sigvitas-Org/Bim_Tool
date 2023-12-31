<?php

namespace App\Notifications;

use App\Models\Project;

class NewProject extends BaseNotification
{


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private $project;

    /**
     * @var \Illuminate\Contracts\Foundation\Application|\Illuminate\Session\SessionManager|\Illuminate\Session\Store|mixed
     */

    public function __construct(Project $project)
    {
        $this->project = $project;
        $this->company = $this->project->company;
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
        $url = route('projects.show', $this->project->id);
        $url = getDomainSpecificUrl($url, $this->company);

        $content = __('email.newProject.text') . ' - ' . ucfirst($this->project->project_name) . '. ' . __('email.newProject.loginNow');

        return parent::build()
            ->subject(__('email.newProject.subject') . ' - ' . config('app.name') . '.')
            ->greeting(__('email.hello') . ' ' . mb_ucwords($notifiable->name) . ',')
            ->markdown('mail.project.created', ['url' => $url, 'content' => $content]);
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
        return $this->project->toArray();
    }

}
