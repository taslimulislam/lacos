<?php

namespace App\Http\Controllers\frontend;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Mail;
use Modules\Cms\Entities\CmsSetting;
use Illuminate\Contracts\Session\Session;

class Contact extends Controller
{
       
    public function index(Request $request){
        return view('frontend.pages.__contact');
    }
      
    public function PrivacyPolicy(Request $request){
        return view('frontend.pages.__privacy_policy',[
            'CmsSetting'=> CmsSetting::firstWhere('id',3)
        ]);
    }

    public function sendMail(Request $request)
    {

        $request->validate([
            "email"          => 'required|string|email',
            "subject"        => 'required|string',
            "message"        => 'required|string|max:500|min:250',
            "name"           => 'required|string',
        ]);

        Mail::to($request->email)->send(new ContactMail($request->all()));
        return redirect()->back()->with('message', 'Success! Email has been sent successfully.');;

    }



}
