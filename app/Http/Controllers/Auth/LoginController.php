<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Redirect;
use Modules\User\Entities\PasswordSetting;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }



    public function showLoginForm()
    {

        // return "sdfsdf";
        return view('auth.login');
    }


    public function login(Request $request)
    {

        $passwordSetting = PasswordSetting::firstOrFail();
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        $credentials['password'] = $request->password . $passwordSetting->salt;
        
        if (Auth::attempt($credentials)) {

            if(auth()->user()->email_verification_token!='' && auth()->user()->is_active==0){
                return back()->with('exception', 'You are not a verifyed user, Please check your email and verify')->onlyInput('email');
            }

            $request->session()->regenerate();
            if(auth()->user()->user_type_id == 1){
                return redirect()->intended('home');
            } else if(auth()->user()->user_type_id == 3) {
                return redirect()->route('userpanel.startup');
            }
            else if(auth()->user()->user_type_id == 4) {
                return redirect()->route('userpanel.investor');
            }
            else if(auth()->user()->user_type_id == 5) {
                return redirect()->route('userpanel.hub');
            }
            else if(auth()->user()->user_type_id == 6) {
                return redirect()->route('userpanel.guest');
            }
           
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
