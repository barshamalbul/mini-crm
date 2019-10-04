<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storeemployees extends FormRequest
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
        return [ 
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required:employees',
                'phone' => 'required|regex:/(98)[0-8]{8}/',
                'company' => 'required',
            //
        ];
    }


public function messages()
{
    return [
        
             'first_name.required' => 'field Cannot Be Empty!!',
            'last_name.required' => 'field Cannot Be Empty!!',
            'email.required' => 'field Cannot Be Empty!!',
            'phone.required' => 'field Cannot Be Empty!!',
            'company.required' => 'field Cannot Be Empty!!',
    ];
}

}
