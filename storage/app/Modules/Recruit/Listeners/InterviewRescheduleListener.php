<?php

namespace Modules\Recruit\Listeners;

use Notification;
use Modules\Recruit\Events\InterviewRescheduleEvent;
use Modules\Recruit\Notifications\RescheduleInterview;
use Modules\Recruit\Notifications\RecruiterRescheduleInterview;

class InterviewRescheduleListener
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
    public function handle(InterviewRescheduleEvent $interview)
    {
        Notification::send($interview->interview->jobApplication->job->recruiter, new RecruiterRescheduleInterview($interview->interview));

        Notification::send($interview->employee, new RescheduleInterview($interview->interview));
    }
    
}
