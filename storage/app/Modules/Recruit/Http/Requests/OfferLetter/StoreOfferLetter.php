<?php

namespace Modules\Recruit\Http\Requests\OfferLetter;

use App\Http\Requests\CoreRequest;

class StoreOfferLetter extends CoreRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        return [
            'jobId' => 'required',
            'jobApplicant' => 'required',
            'jobExpireDate' => 'required',
            'expJoinDate' => 'required',
            'comp_amount' => 'required',
            'pay_according' => 'required',
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

    public function messages()
    {
        return [
            'jobId.required' => 'Job field is required',
            'jobApplicant.required' => 'Job applicant field is required',
            'jobExpireDate.required' => 'Offer expire field is required',
            'expJoinDate.required' => 'Expected joining date field is required',
            'comp_amount.required' => 'Compansation amount field is required',
            'pay_according.required' => 'Pay according field is required',
            'signature.required' => 'Signature is required'

        ];
    }
    
}
