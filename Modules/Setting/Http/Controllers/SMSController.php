<?php

namespace Modules\Setting\Http\Controllers;

use Modules\Setting\Entities\SMS;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Modules\Setting\Http\Requests\SmsRequest;

class SMSController extends Controller
{
    public function index(){

        return view('setting::sms.index',[
            'sms' => SMS::first()
        ]);
    }

    public function store(SmsRequest $request){
        
        if($request->id){
            $sms = SMS::findOrFail($request->id);
        } else {
            $sms = new SMS();
        }

        $sms->fill($request->all());
        $sms->save();

        Toastr::success('SMS Setting Successfully :)','Success');
        return redirect()->route('sms.index')->with(['success' => 'Data updated successfully']);
    }
}
