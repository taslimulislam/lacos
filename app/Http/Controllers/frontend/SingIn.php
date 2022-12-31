<?php

namespace App\Http\Controllers\frontend;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\User\Entities\PasswordSetting;

class SingIn extends Controller
{

    public function index(Request $request){


        if(!empty($request->all())){

            
            $passwordSetting = PasswordSetting::firstOrFail();
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            $credentials['password'] = $request->password . $passwordSetting->salt;

            if (Auth::attempt($credentials)) {

                if(auth()->user()->email_verification_token!='' && auth()->user()->user_type_id==0){
                    return back()->with('exception', 'You are not a verifyed user, Please check your email and verify')->onlyInput('email');
                }

                $request->session()->regenerate();
                if(auth()->user()->user_type_id == 1){
                    return redirect()->intended('home');
                } else if(auth()->user()->user_type_id == 3) {
                    return redirect()->intended('/student/dashboard');
                }
            }
    
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }
        
        return view('frontend.auth.__sign_in');

    }



    
    public function verifyEmail($token=null){

        
        if($token==''){
            Session::flash('exception', "Please put the valid token");
            return redirect()->route('sign-in');
        }

        $user = User::where('email_verification_token',$token)->first();
        
        if(empty($user)){
            Session::flash('exception', "Please put the valid token");
            return redirect()->route('sign-in');
        }

        $data = array(
            'is_active'=>1,
            'email_verified_at'=> Carbon::now()
        );

        User::where('id',$user->id)->update($data);

        return redirect()->route('sign-in')->with('message', "Email Verification Successfully, You can login");


    }



    

}
