<?php

namespace Modules\Recruit\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Modules\Recruit\Entities\RecruitInterviewEmployees;

class EmployeeResponse extends Notification implements ShouldQueue
{
    use Queueable;
    private $scheduleEmployee;
    private $type;
    private $userData;
    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public function __construct(RecruitInterviewEmployees $scheduleEmployee, $type, $userData)
    {
        $this->scheduleEmployee = $scheduleEmployee;
        $this->type = $type;
        $this->userData = $userData;
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
        $status = ($this->scheduleEmployee->user_accept_status == 'accept') ? 'accepted' : 'declined';
        $emailContent = (new MailMessage)
            ->subject(__('recruit::modules.email.subject'))
            ->greeting(__('email.hello').' ' . ucwords($notifiable->name) . '!');

        if ($this->scheduleEmployee->user_accept_status == 'accept') {
            $emailContent = $emailContent->line(__('recruit::modules.interviewSchedule.interviewOn').' - ' . $this->scheduleEmployee->schedule->schedule_date->format('M d, Y h:i a'));

            $emailContent = $emailContent->line(__('recruit::modules.interviewSchedule.employeeResponses', ['type' => ucfirst($this->scheduleEmployee->schedule->interview_type),'job' => ucwords($this->scheduleEmployee->schedule->jobApplication->job->title)]).' ' .ucwords($this->scheduleEmployee->schedule->jobApplication->full_name));
        }
        else {
            $emailContent = $emailContent->line(__('recruit::messages.yourResponse'));
            $emailContent = $emailContent->line(__('recruit::modules.interviewSchedule.interviewWasOn').' - ' . $this->scheduleEmployee->schedule->schedule_date->format('M d, Y h:i a'));

            $emailContent = $emailContent->line(__('recruit::modules.interviewSchedule.employeeRejectResp', ['type' => ucfirst($this->scheduleEmployee->schedule->interview_type),'job' => ucwords($this->scheduleEmployee->schedule->jobApplication->job->title)]).' ' .ucwords($this->scheduleEmployee->schedule->jobApplication->full_name));
        }

        $emailContent = $emailContent->line(__('recruit::modules.email.thankyouNote'));
        return $emailContent;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray()
    {
        return [
            'user_id' => $this->scheduleEmployee->user_id,
            'interview_id' => $this->scheduleEmployee->schedule->id,
            'heading' => $this->scheduleEmployee->schedule->jobApplication->full_name
        ];
    }

}
