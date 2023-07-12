<?php

namespace Modules\Recruit\Http\Requests\JobApplication;

use App\Http\Requests\CoreRequest;
use Modules\Recruit\Entities\RecruitJob;
use Modules\Recruit\Rules\CheckApplication;

class UpdateJobApplication extends CoreRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return bool
     */

    public function rules()
    {
        if (request()->job_id) {
            $jobId = RecruitJob::where('id', request()->job_id)->first();

            $data = ['job_id' => 'required',
                    'full_name' => 'required',
                    'email' => [new CheckApplication],
                    'phone' => 'required',
                    'location_id' => 'required',];

            if ($jobId->is_gender_require) {
                $data['gender'] = 'required';
            }

            if ($jobId->is_dob_require) {
                $data['date_of_birth'] = 'required';
            }

            if ($jobId->is_photo_require) {
                $data['photo'] = 'required';
            }

            if ($jobId->is_resume_require) {
                $data['resume'] = 'required';
            }
        }
        else {
            $data = ['job_id' => 'required',
                    'full_name' => 'required',
                    'phone' => 'required',
                    'location_id' => 'required',];
        }

        return $data;
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'job_id.required' => __('recruit::modules.message.jobRequired'),
            'name.required' => __('recruit::modules.message.nameRequired'),
            'email.required' => __('recruit::modules.message.emailRequired'),
            'phone.required' => __('recruit::modules.message.phoneRequired'),
            'gender.required' => __('recruit::modules.message.genderRequired'),
            'location_id.required' => __('recruit::modules.message.locationRequired')
        ];
    }
    
}
