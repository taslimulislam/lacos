<?php

namespace Modules\UserPanel\Http\Controllers;

use App\Models\User;
use App\Traits\CommonTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;

class GuestController extends Controller
{
    
    use CommonTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $info = User::where(['user_type_id'=>6,'id'=>auth()->user()->id])->first();
        return view('userpanel::pages.__guest_users',[
            'info'          => $info,
        ]);
    }


  
}
