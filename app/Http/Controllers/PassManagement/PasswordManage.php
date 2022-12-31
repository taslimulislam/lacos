<?php

namespace App\Http\Controllers\PassManagement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Modules\User\Entities\PasswordSetting;

class PasswordManage extends Controller
{
    public function __construct()
    {
        
    }

    public function passwordResetForm(Request $request){

        if($request->all()){
            $passwordSetting = PasswordSetting::firstOrFail();
            $this->validator($request->all())->validate();
            $data = $request->except(['password','user_type_id']);
            $data['password']       = $request->password . $passwordSetting->salt;
            $data['user_type_id']   = $request->type;
            $data['user_name']      = $request->user_name;
            $this->create($data);
            Session::flash('message', "Sign Up Successfully, You have signed-in");
            return redirect()->back();

        }

        return view('frontend.auth.__password_reset');
    }


    public function addPasswordForm(Request $request){

        if($request->all()){

            $passwordSetting = PasswordSetting::firstOrFail();
            $this->validator($request->all())->validate();
            $data['password'] = $request->password . $passwordSetting->salt;

            $passwordSetting = PasswordSetting::firstOrFail();
            $this->validator($request->all())->validate();

            Session::flash('message', "Sign Up Successfully, You have signed-in");
            return redirect()->back();
        }

        return view('frontend.auth.__reset');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

}
