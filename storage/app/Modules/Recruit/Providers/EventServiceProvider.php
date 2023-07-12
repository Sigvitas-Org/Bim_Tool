<?php

namespace Modules\Recruit\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Recruit\Events\HostInterviewEvent;
use Modules\Recruit\Events\InterviewRescheduleEvent;
use Modules\Recruit\Events\NewJobEvent;
use Modules\Recruit\Events\UpdateJobEvent;
use Modules\Recruit\Events\OfferLetterEvent;
use Modules\Recruit\Listeners\NewJobListener;
use Modules\Recruit\Listeners\UpdateJobListener;
use Modules\Recruit\Events\InterviewScheduleEvent;
use Modules\Recruit\Events\UpdateInterviewScheduleEvent;
use Modules\Recruit\Events\NewJobApplicationEvent;
use Modules\Recruit\Events\UpdateOfferLetterEvent;
use Modules\Recruit\Events\JobOfferStatusChangeEvent;
use Modules\Recruit\Events\UpdateJobApplicationEvent;
use Modules\Recruit\Listeners\InterviewScheduleListener;
use Modules\Recruit\Listeners\UpdateInterviewScheduleListener;
use Modules\Recruit\Listeners\OfferLetterListener;
use Modules\Recruit\Listeners\HostInterviewListener;
use Modules\Recruit\Listeners\NewJobApplicationListener;
use Modules\Recruit\Listeners\UpdateOfferLetterListener;
use Modules\Recruit\Listeners\InterviewRescheduleListener;
use Modules\Recruit\Events\CandidateInterviewScheduleEvent;
use Modules\Recruit\Events\JobApplicationStatusChangeEvent;
use Modules\Recruit\Listeners\JobOfferStatusChangeListener;
use Modules\Recruit\Listeners\UpdateJobApplicationListener;
use Modules\Recruit\Events\CandidateInterviewRescheduleEvent;
use Modules\Recruit\Listeners\CandidateInterviewScheduleListener;
use Modules\Recruit\Listeners\JobApplicationStatusChangeListener;
use Modules\Recruit\Listeners\CandidateInterviewRescheduleListener;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        InterviewScheduleEvent::class => [InterviewScheduleListener::class],
        UpdateInterviewScheduleEvent::class => [UpdateInterviewScheduleListener::class],
        CandidateInterviewScheduleEvent::class => [CandidateInterviewScheduleListener::class],
        OfferLetterEvent::class => [OfferLetterListener::class],
        JobOfferStatusChangeEvent::class => [JobOfferStatusChangeListener::class],
        JobApplicationStatusChangeEvent::class => [JobApplicationStatusChangeListener::class],
        CandidateInterviewRescheduleEvent::class => [CandidateInterviewRescheduleListener::class],
        InterviewRescheduleEvent::class => [InterviewRescheduleListener::class],
        HostInterviewEvent::class => [HostInterviewListener::class],
        NewJobEvent::class => [NewJobListener::class],
        UpdateJobEvent::class => [UpdateJobListener::class],
        NewJobApplicationEvent::class => [NewJobApplicationListener::class],
        UpdateJobApplicationEvent::class => [UpdateJobApplicationListener::class],
        UpdateOfferLetterEvent::class => [UpdateOfferLetterListener::class],

    ];
}
