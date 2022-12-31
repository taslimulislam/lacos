<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminUserAccessable
{

    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->user_type_id!='1'){
            return  Redirect::route('userpanel.overview');
        }
        return $next($request);
    }
}
