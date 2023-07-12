<?php

namespace Modules\Recruit\Listeners;

use Modules\Recruit\Entities\RecruitApplicationStatus;
use Notification;
use Modules\Recruit\Entities\RecruitJob;
use Modules\Recruit\Events\UpdateJobApplicationEvent;
use Modules\Recruit\Notifications\UpdateJobApplication;
use Modules\Recruit\Notifications\RecruiterJobApplicationStatusChanged;

class UpdateJobApplicationListener
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
    public function handle(UpdateJobApplicationEvent $event)
    {
        $slug = RecruitApplicationStatus::where('id', $event->jobApplication->status_id)->select('slug')->first();

        if ($event->jobApplication->isDirty('status_id')) {
            $remain = $event->jobApplication->job->remaining_openings;
            $openings = RecruitJob::findOrFail($event->jobApplication->job->id);

            if ($slug->slug == 'hired') {
                $remain = ($remain - 1);
            }
            else {
                $remain = ($remain + 1);
            }

            $openings->remaining_openings = $remain;
            $openings->update();

            Notification::send($event->jobApplication->job->recruiter, new RecruiterJobApplicationStatusChanged($event->jobApplication));
        }
        else {
            Notification::send($event->jobApplication->job->recruiter, new UpdateJobApplication($event->jobApplication));
        }
    }
    
}
