<?php

namespace Modules\Recruit\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Modules\Recruit\Entities\RecruitJobOfferLetter;

class JobOfferStatusChangeEvent
{
    use Dispatchable, InteractsWithSockets ,SerializesModels;

    public $offer;
    public $user;
    public $recruiter;
    /**
     * Create a new event instance.
     *
     * @return void
     */

    public function __construct(RecruitJobOfferLetter $jobOffer, $user)
    {
        $this->offer = $jobOffer;
        $this->recruiter = $jobOffer->job->employee;
        $this->user = $user;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }

}
