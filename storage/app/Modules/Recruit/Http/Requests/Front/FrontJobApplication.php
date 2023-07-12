<?php

namespace Modules\Recruit\Http\Requests\Front;

use App\Http\Requests\CoreRequest;
use Modules\Recruit\Entities\RecruitJob;
use Modules\Recruit\Rules\CheckApplication;

class FrontJobApplication extends CoreRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    public function rules()
    {
        $jobId = RecruitJob::where('id', request()->job_id)->first();

        $data = [
        'full_name' => 'required',
        'email' => ['required' , new CheckApplication],
        'phone' => 'required',
        'term_agreement' => 'required',
        ];

        if ($jobId->is_resume_require) {
            $data['resume'] = 'required';
        }

        if ($jobId->is_photo_require) {
            $data['photo'] = ['required', 'mimes:jpeg,bmp,png,jpg'];
        }

        if ($jobId->is_dob_require) {
            $data['date_of_birth'] = 'required';
        }

        if ($jobId->is_gender_require) {
            $data['gender'] = 'required';
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
            'full_name.required' => __('recruit::modules.message.nameRequired'),
            'email.required' => __('recruit::modules.message.emailRequired'),
            'phone.required' => __('recruit::modules.message.phoneRequired'),
            'resume.required' => __('recruit::modules.message.resumeRequired'),
            'photo.required' => __('recruit::modules.message.photoRequired'),
            'term_agreement.required' => __('recruit::modules.message.termAgreement'),
        ];
    }
    
}
