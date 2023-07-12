<?php

namespace Modules\Recruit\Http\Requests\ApplicantNote;

use App\Http\Requests\CoreRequest;

class StoreJobApplicant extends CoreRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'comment' => [
                'required',
                function ($attribute, $value, $fail) {
                    $commnet = trim(str_replace('<p><br></p>', '', $value));

                    if ($commnet == '') {
                        $fail(__('validation.required'));
                    }
                }
            ]
        ];
    }

    public function messages()
    {
        return [
             'comment.required' => __('recruit::modules.skill.addSkills')
        ];
    }
    
}
