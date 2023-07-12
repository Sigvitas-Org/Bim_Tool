<?php

namespace Modules\Recruit\Events;

use Illuminate\Queue\SerializesModels;
use Modules\Recruit\Entities\RecruitJob;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class NewJobEvent
{
    use Dispatchable, InteractsWithSockets ,SerializesModels;


    public $job;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public function __construct(RecruitJob $job)
    {
        $this->job = $job;
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
