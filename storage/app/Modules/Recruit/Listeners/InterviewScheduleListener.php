<?php

namespace Modules\Recruit\Listeners;

use App\Models\User;
use Notification;
use Modules\Recruit\Events\InterviewScheduleEvent;
use Modules\Recruit\Notifications\AdminNewInterviewSchedule;
use Modules\Recruit\Notifications\ScheduleInterview;
use Modules\Recruit\Notifications\RecruiterInterviewSchedule;

class InterviewScheduleListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(InterviewScheduleEvent $interview)
    {
        $users = User::allAdmins()->pluck('id')->toArray();
        $id = $interview->interview->jobApplication->job->recruiter->id;

        if (in_array($id, $users)) {
            Notification::send(User::allAdmins(), new AdminNewInterviewSchedule($interview->interview));
            Notification::send($interview->employee, new ScheduleInterview($interview->interview));
        }
        else {
            Notification::send(User::allAdmins(), new AdminNewInterviewSchedule($interview->interview));
            Notification::send($interview->interview->jobApplication->job->recruiter, new RecruiterInterviewSchedule($interview->interview));
            Notification::send($interview->employee, new ScheduleInterview($interview->interview));
        }
    }
    
}
