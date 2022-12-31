<?php

namespace Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserTypeRequest extends FormRequest
{

    public function rules()
    {
        return [
           'user_type_title' => 'required|string'
        ];
    }


    public function authorize()
    {
        return true;
    }
}
