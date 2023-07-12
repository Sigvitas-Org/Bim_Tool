<?php

namespace Modules\Recruit\Listeners;

use Notification;
use App\Models\User;
use Modules\Recruit\Events\NewJobApplicationEvent;
use Modules\Recruit\Notifications\NewJobApplication;
use Modules\Recruit\Notifications\AdminNewJobApplication;

class NewJobApplicationListener
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
    public function handle(NewJobApplicationEvent $event)
    {
        $users = User::allAdmins()->pluck('id')->toArray();
        $id = $event->jobApplication->job->recruiter->id;

        if (in_array($id, $users)) {
            Notification::send(User::allAdmins(), new AdminNewJobApplication($event->jobApplication));
        }
        else {
            Notification::send($event->jobApplication->job->recruiter, new NewJobApplication($event->jobApplication));
            Notification::send(User::allAdmins(), new AdminNewJobApplication($event->jobApplication));
        }
    }
    
}
