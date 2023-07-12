<?php
namespace Modules\Recruit\Observers;

use Modules\Recruit\Entities\OfferLetterHistory;
use Modules\Recruit\Entities\RecruitJobOfferLetter;
use Modules\Recruit\Entities\RecruitJobOfferLetterFiles;

class OfferLetterFileObserver
{

    public function saving(RecruitJobOfferLetterFiles $event)
    {
        if (!isRunningInConsoleOrSeeding() && user()) {
            $event->last_updated_by = user()->id;
        }
    }

    public function creating(RecruitJobOfferLetterFiles $event)
    {
        if (!isRunningInConsoleOrSeeding() && user()) {
            $event->added_by = user()->id;
        }
    }

    public function created(RecruitJobOfferLetterFiles $event)
    {
        if (\user()) {
            $this->logOfferLetterActivity(null, $event->id, user()->id, 'fileActivity');
        }
    }

    public function logOfferLetterActivity($letterID, $fileID, $userID, $text)
    {
        $activity = new OfferLetterHistory();

        if (!is_null($letterID)) {
            $activity->job_offer_id = $letterID;
        }

        if (!is_null($fileID)) {
            $activity->file_id = $fileID;
        }

        $activity->user_id = $userID;
        $activity->details = $text;
        $activity->save();
    }
    
}
