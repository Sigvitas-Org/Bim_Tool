<?php

namespace Modules\Recruit\Listeners;

use Notification;
use App\Models\User;
use Modules\Recruit\Events\NewJobEvent;
use Modules\Recruit\Notifications\JobRecruiter;
use Modules\Recruit\Notifications\AdminNewJob;

class NewJobListener
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
    public function handle(NewJobEvent $event)
    {
        $users = User::allAdmins()->pluck('id')->toArray();
        $id = $event->job->recruiter->id;

        if (in_array($id, $users)) {
            Notification::send(User::allAdmins(), new AdminNewJob($event->job));
        }
        else {
            Notification::send($event->job->recruiter, new JobRecruiter($event->job));
            Notification::send(User::allAdmins(), new AdminNewJob($event->job));
        }
    }
    
}
