<?php

namespace Modules\Recruit\Rules;

use Illuminate\Contracts\Validation\Rule;
use Modules\Recruit\Entities\JobInterviewStage;
use Modules\Recruit\Entities\RecruitInterviewSchedule;
use Modules\Recruit\Entities\RecruitInterviewStage;

class CheckInterviewSchedule implements Rule
{

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $interview = RecruitInterviewSchedule::where('job_application_id', $value)->orWhere('status', request()->status)->first();

        if ($interview) {
            if ($interview->status == 'rejected' || $interview->status == 'canceled' || $interview->parent_id == null) {
                return true;
            }

            return false;
        }

            return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The interview has been scheduled.';
    }

}
