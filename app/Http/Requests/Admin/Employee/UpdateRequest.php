<?php

namespace App\Http\Requests\Admin\Employee;

use App\Models\EmployeeDetails;
use App\Http\Requests\CoreRequest;

class UpdateRequest extends CoreRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $detailID = EmployeeDetails::where('user_id', $this->route('employee'))->first();
        $setting = company();
        $rules = [
            'employee_id' => 'required|max:50|unique:employee_details,employee_id,'.$detailID->id.',id,company_id,' . company()->id,
            'email' => 'required|max:100|unique:users,email,'.$this->route('employee').',id,company_id,' . company()->id,
            'name'  => 'required|max:50',
            'hourly_rate' => 'nullable|numeric',
            'department' => 'required',
            'designation' => 'required',
            'joining_date' => 'required',
            'last_date' => 'nullable|date_format:"' . $setting->date_format . '"|after_or_equal:joining_date',
            'country' => 'required_with:mobile',
            'date_of_birth' => 'nullable|date_format:"' . $setting->date_format . '"|before_or_equal:'.now($setting->timezone)->toDateString(),
        ];

        if ($detailID) {
            $rules['slack_username'] = 'nullable|unique:employee_details,slack_username,'.$detailID->id.',id,company_id,' . company()->id;
        }
        else {
            $rules['slack_username'] = 'nullable|unique:employee_details,slack_username,null,id,company_id,' . company()->id;
        }

        if (request()->password != '') {
            $rules['password'] = 'required|min:8|max:50';
        }

        if (request()->telegram_user_id) {
            $rules['telegram_user_id'] = 'nullable|unique:users,telegram_user_id,' . $detailID->user_id.',id,company_id,' . company()->id;
        }

        if (request()->get('custom_fields_data')) {
            $fields = request()->get('custom_fields_data');

            foreach ($fields as $key => $value) {
                $idarray = explode('_', $key);
                $id = end($idarray);
                $customField = \App\Models\CustomField::findOrFail($id);

                if ($customField->required == 'yes' && (is_null($value) || $value == '')) {
                    $rules['custom_fields_data['.$key.']'] = 'required';
                }

            }
        }

        return $rules;
    }

    public function attributes()
    {
        $attributes = [];

        if (request()->get('custom_fields_data')) {
            $fields = request()->get('custom_fields_data');

            foreach ($fields as $key => $value) {
                $idarray = explode('_', $key);
                $id = end($idarray);
                $customField = \App\Models\CustomField::findOrFail($id);

                if ($customField->required == 'yes') {
                    $attributes['custom_fields_data['.$key.']'] = $customField->label;
                }
            }
        }

        return $attributes;
    }

}
