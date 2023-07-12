<?php

namespace Modules\Recruit\Http\Requests\ZoomMeeting;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Recruit\Rules\CheckInterviewSchedule;

class StoreInterview extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        if ($this->interview_type == 'phone') {
            $data = [
                'phone' => 'required|numeric',
                'applicationID'    => ['required', new CheckInterviewSchedule],
                'employee_id.0'   => 'required',
            ];
        }
        else {
            $data = [
            'applicationID'    => ['required',new CheckInterviewSchedule],
            'employee_id.0'   => 'required',
            ];
        }

        if ($this->interview_type == 'video') {
            if ($this->video_type == 'zoom') {
                $data = [
                    'meeting_title' => 'required',
                    'applicationID'    => ['required', new CheckInterviewSchedule],
                    'end_date' => 'required',
                    'end_time'    => 'required',
                    'employee_id.0' => 'required',
                ];
            }
            else {
                $data = [
                    'other_link'    => 'required',
                    'applicationID'    => ['required', new CheckInterviewSchedule],
                    'employee_id.0'   => 'required',
                ];
            }
        }

        return $data;
    }

    public function messages()
    {
        return [
            'employee_id.0.required' => __('recruit::messages.employeeField'),
            'applicationID.0.required' => __('recruit::messages.candidateField'),
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    public function authorize()
    {
        return true;
    }
    
}
