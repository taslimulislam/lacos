<?php

namespace Modules\Setting\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
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
        $rules =  [
            'title' => 'required|string',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'footer_text' => 'required',

        ];

        if($this->_method != 'PATCH'){
            $rules =  [
                'logo' => 'required'
            ];
        }

        return $rules;
    }
}
