<?php

namespace Modules\Recruit\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Modules\Recruit\Entities\RecruitInterviewSchedule;

class CandidateInterviewRescheduleEvent
{
    use Dispatchable, InteractsWithSockets ,SerializesModels;

    public $interview;
    public $jobApplication;
    /**
     * Create a new event instance.
     *
     * @return void
     */

    public function __construct(RecruitInterviewSchedule $interview, $jobApplication)
    {
        $this->interview = $interview;
        $this->jobApplication = $jobApplication;
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
