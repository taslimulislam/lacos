<?php

namespace App\Http\Controllers;


class StartupDashboard extends Controller
{
   
    public function __construct()
    {
        $this->middleware(['auth']);       
    }

    public function StartupDashboard() {

        return "test";
        
    }

    public function studentProfile() {
        
    }


}
