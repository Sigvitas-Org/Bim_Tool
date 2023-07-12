<?php

namespace Modules\Recruit\Listeners;

use Notification;
use App\Models\User;
use Modules\Recruit\Notifications\JobOfferStatusChange;
use Modules\Recruit\Events\JobOfferStatusChangeEvent;

class JobOfferStatusChangeListener
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
    public function handle(JobOfferStatusChangeEvent $jobOffer)
    {
        Notification::send($jobOffer->user, new JobofferStatusChange($jobOffer->offer));

        $isAdmin = User::isAdmin($jobOffer->offer->job->employee->id);

        if ($isAdmin === false) {
            Notification::send($jobOffer->recruiter, new JobofferStatusChange($jobOffer->offer));
        }
    }
    
}
