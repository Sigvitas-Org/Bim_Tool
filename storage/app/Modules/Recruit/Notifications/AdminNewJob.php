<?php

namespace Modules\Recruit\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Modules\Recruit\Entities\RecruitEmailNotificationSetting;
use Modules\Recruit\Entities\RecruitJob;

class AdminNewJob extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private $job;
    private $emailSetting;
    private $recruiter;

    public function __construct($job)
    {
        $this->job = $job;
        $this->emailSetting = RecruitEmailNotificationSetting::where('slug', 'new-jobadded-by-admin')->first();
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
        return (new MailMessage)
            ->subject(__('recruit::modules.adminMail.newJobSubject'))
            ->greeting(__('email.hello') . ' ' . ucwords($notifiable->name) . '!')
            ->line(__('recruit::modules.adminMail.newJobText') . ' - ' . ucwords($this->job->title))
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
        $this->recruiter = RecruitJob::with('user')->where('id', $this->job->id)->first();
        return [
            'user_id' => $notifiable->id,
            'job_id' => $this->job->id,
            'heading' => $this->job->title,
            'user_image' => $this->recruiter->user->image_url
        ];
    }

}
