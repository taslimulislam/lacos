<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Routing\Controller;
use Modules\User\Entities\PasswordSetting;
use Modules\User\Http\Requests\PasswordSettingRequest;

class PasswordSettingController extends Controller
{

    public function index()
    {
        return view('user::password-setting.index',[
            'passwordSettings' => PasswordSetting::get()
        ]);
    }

    public function store(PasswordSettingRequest $request)
    {
        $passwordSetting = new PasswordSetting();
        $passwordSetting->fill($request->all());
        $passwordSetting->save();
        Toastr::success('Password Setting successfully :)','Success');
        return redirect()->route('password-settings.index');
    }

    public function update(PasswordSettingRequest $request, $uuid)
    {
        $passwordSetting = PasswordSetting::where('uuid' , $uuid)->firstOrFail();
        $passwordSetting->fill($request->all());
        $passwordSetting->save();
        Toastr::success('Password Setting  updated successfully :)','Success');
        return redirect()->route('password-settings.index');
    }

}
