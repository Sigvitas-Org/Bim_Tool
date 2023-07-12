<?php

namespace Modules\Recruit\Listeners;

use Notification;
use App\Models\User;
use Modules\Recruit\Events\UpdateJobEvent;
use Modules\Recruit\Notifications\UpdateJob;
use Modules\Recruit\Notifications\JobRecruiter;
use Modules\Recruit\Notifications\RemoveJobRecruiter;

class UpdateJobListener
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
    public function handle(UpdateJobEvent $event)
    {
        if ($event->job->isDirty('recruiter_id')) {
            $oldJob = $event->job->getOriginal();
            Notification::send(User::find($oldJob['recruiter_id']), new RemoveJobRecruiter($oldJob));
            Notification::send($event->job->recruiter, new JobRecruiter($event->job));
        }
        else {
            Notification::send($event->job->recruiter, new UpdateJob($event->job));
        }
    }
    
}
