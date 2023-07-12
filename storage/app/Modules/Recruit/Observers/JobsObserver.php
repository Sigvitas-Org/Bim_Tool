<?php
namespace Modules\Recruit\Observers;

use Modules\Recruit\Events\JobEvent;
use Modules\Recruit\Events\NewJobEvent;
use Modules\Recruit\Entities\RecruitJob;
use Modules\Recruit\Events\UpdateJobEvent;
use Modules\Recruit\Entities\RecruitJobHistory;

class JobsObserver
{

    public function saving(RecruitJob $event)
    {
        if (!isRunningInConsoleOrSeeding() && user()) {
            $event->last_updated_by = user()->id;
        }
    }

    public function creating(RecruitJob $event)
    {
        if (!isRunningInConsoleOrSeeding() && user()) {
            $event->added_by = user()->id;
        }
    }

    public function created(RecruitJob $event)
    {
        if (!isRunningInConsoleOrSeeding()) {
            if (\user()) {
                $this->logRecruitJobsActivity($event->id, user()->id, 'createJob', null, null, null);
            }

            event(new NewJobEvent($event));
        }
    }

    public function updated(RecruitJob $event)
    {
        if (!isRunningInConsoleOrSeeding()) {
            if (\user()) {
                $this->logRecruitJobsActivity($event->id, user()->id, 'updateJob', null, null, null);
            }

            event(new UpdateJobEvent($event));
        }
    }

    public function logRecruitJobsActivity($jobID, $userID, $text, $jobapplicationID, $interviewID, $letterID)
    {
        $activity = new RecruitJobHistory();

        if (!is_null($jobID)) {
            $activity->job_id = $jobID;
        }

        if (!is_null($jobapplicationID)) {
            $activity->job_application_id = $jobapplicationID;
        }

        if (!is_null($interviewID)) {
            $activity->interview_schedule_id = $interviewID;
        }

        if (!is_null($letterID)) {
            $activity->job_offer_id = $letterID;
        }

        $activity->user_id = $userID;
        $activity->details = $text;
        $activity->save();
    }
    
}
