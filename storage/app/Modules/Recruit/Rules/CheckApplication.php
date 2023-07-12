<?php

namespace Modules\Recruit\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;
use Modules\Recruit\Entities\RecruitJobApplication;
use Modules\Recruit\Entities\RecruitSetting;

class CheckApplication implements Rule
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
        $restriction = RecruitSetting::select('application_restriction')->first();
        $jobId = request()->job_id;
        $allApplications = RecruitJobApplication::where('email', $value)->whereNotNull('email')->where('job_id', $jobId)->select('email', 'created_at')->withTrashed()->first();

        if ($allApplications && $restriction->application_restriction != 0) {
            $daysCount = now()->diffInDays($allApplications->created_at);

            if ($daysCount >= $restriction->application_restriction) {
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
        return 'The application already exist.';
    }

}
