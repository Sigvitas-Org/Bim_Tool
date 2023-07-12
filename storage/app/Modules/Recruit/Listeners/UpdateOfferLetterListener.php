<?php

namespace Modules\Recruit\Listeners;

use Notification;
use Modules\Recruit\Events\UpdateOfferLetterEvent;
use Modules\Recruit\Notifications\UpdateOfferLetter;
use Modules\Recruit\Notifications\RecruiterOfferLetter;

class UpdateOfferLetterListener
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
    public function handle(UpdateOfferLetterEvent $event)
    {
        if ($event->jobOffer->isDirty('job_app_id')) {
            Notification::send($event->jobOffer->job->recruiter, new RecruiterOfferLetter($event->jobOffer));
        }
        else {
            Notification::send($event->jobOffer->job->recruiter, new UpdateOfferLetter($event->jobOffer));
        }
    }
    
}
