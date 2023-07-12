<?php

namespace Modules\Recruit\Listeners;

use App\Models\User;
use Notification;
use Modules\Recruit\Events\OfferLetterEvent;
use Modules\Recruit\Notifications\SendOfferLetter;
use Modules\Recruit\Notifications\AdminNewOfferLetter;
use Modules\Recruit\Notifications\RecruiterOfferLetter;

class OfferLetterListener
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
    public function handle(OfferLetterEvent $jobOffer)
    {
        $users = User::allAdmins()->pluck('id')->toArray();
        $id = $jobOffer->jobOffer->jobApplication->job->recruiter->id;

        if (in_array($id, $users)) {
            Notification::send(User::allAdmins(), new AdminNewOfferLetter($jobOffer->jobOffer));

            if ($jobOffer->jobOffer->jobApplication->email != null) {
                Notification::send($jobOffer->jobOffer->jobApplication, new SendOfferLetter($jobOffer->jobOffer));
            }
        } else {
            Notification::send(User::allAdmins(), new AdminNewOfferLetter($jobOffer->jobOffer));
            Notification::send($jobOffer->jobOffer->job->recruiter, new RecruiterOfferLetter($jobOffer->jobOffer));

            if ($jobOffer->jobOffer->jobApplication->email != null) {
                Notification::send($jobOffer->jobOffer->jobApplication, new SendOfferLetter($jobOffer->jobOffer));
            }
        }
    }
    
}
