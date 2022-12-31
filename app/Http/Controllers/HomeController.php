<?php

namespace App\Http\Controllers;

use Modules\EkoAdmin\Entities\AcademiaModel;
use Modules\EkoAdmin\Entities\Hub;
use Modules\EkoAdmin\Entities\Investor;
use Modules\EkoAdmin\Entities\StartUpModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_start_up = StartUpModel::count();
        $total_academia = AcademiaModel::count();
        $total_hub = Hub::count();
        $total_investor = Investor::count();
        return view('backend.layouts.home')->with([
            'total_start_up' => $total_start_up,
            'total_academia' => $total_academia,
            'total_hub' => $total_hub,
            'total_investor' => $total_investor
        ]);
    }

}
