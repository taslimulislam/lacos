<?php

namespace Modules\Setting\Http\Controllers;

use App\Models\User;
use App\Models\Module;
use Illuminate\Http\Request;
use Modules\Role\Entities\Role;
use Modules\Setting\Entities\SMS;
use Illuminate\Routing\Controller;
use Modules\Setting\Entities\Country;
use Modules\Setting\Entities\Currency;
use Modules\Setting\Entities\Language;
use Modules\Setting\Entities\Application;
use Modules\Setting\Entities\EmailConfig;
use Illuminate\Contracts\Support\Renderable;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index() {
        return view('setting::index', [
            'users'         => User::orderBy('id', 'desc')->get(),
            'app'           => Application::first(),
            'countries'     => Country::withoutGlobalScopes([Asc::class])->get(),
            'currencies'    => Currency::withoutGlobalScopes([Asc::class])->get(),
            'mail'          => EmailConfig::first(),
            'sms'           => SMS::first(),
            'languages'     => Language::withoutGlobalScopes([Asc::class])->get(),
            // 'roles'         => Role::withoutGlobalScopes([Asc::class])->get(),
            // 'modules'       => Module::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('setting::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('setting::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('setting::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
