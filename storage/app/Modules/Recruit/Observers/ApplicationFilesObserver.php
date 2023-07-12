<?php

namespace Modules\Recruit\Observers;

use Modules\Recruit\Entities\RecruitApplicationFile;

class ApplicationFilesObserver
{

    public function saving(RecruitApplicationFile $event)
    {
        if (!isRunningInConsoleOrSeeding() && user()) {
            $event->last_updated_by = user()->id;
        }
    }

    public function creating(RecruitApplicationFile $event)
    {
        if (!isRunningInConsoleOrSeeding() && user()) {
            $event->added_by = user()->id;
        }
    }
    
}
