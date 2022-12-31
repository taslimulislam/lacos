<?php

namespace App\Http\Controllers\frontend;

use Carbon\Carbon;
use App\Traits\CommonTrait;
use Illuminate\Http\Request;
use Modules\EkoAdmin\Entities\Hub;
use Modules\EkoAdmin\Entities\Deal;
use App\Http\Controllers\Controller;
use Modules\EkoAdmin\Entities\Industry;
use Modules\EkoAdmin\Entities\Investor;
use Modules\EkoAdmin\Entities\ProductStage;
use Modules\EkoAdmin\Entities\StartUpModel;
use Modules\EkoAdmin\Entities\InvestmentStage;

class LandingController extends Controller
{
    use CommonTrait;

    public function index(Request $request){


        $dataarray = array();
        $max_investment = 0;
        $totalinvestment = 0;
        $max_startups = 0;
        $max_deals = 0;
        $chartData = "['Industry', 'Deals', 'Number Of Company','Investment'],";

        $chartDataTwo = "['Industry','Investment'],";

        foreach(Industry::get(['id','name']) as $key => $item){
            
            $startupsIds        = StartUpModel::where('industry',$item->id)->get(['user_id'])->toArray();
            $total_startups     = count($startupsIds);

            $infodeal   = Deal::whereIn('startup_user_id',$startupsIds)->checkDaterange($request)
            ->selectRaw('count(*) as total_deals')
            ->selectRaw('sum(deal_amount) as deal_amount')
            ->first();

            $total_deals = $infodeal->total_deals;

            if($infodeal->deal_amount>0){
                $investment = $infodeal->deal_amount / 1000;
            }else{
                $investment = 0;
            }

            if($max_investment<=$infodeal->deal_amount){
                $max_investment =  $infodeal->deal_amount;
            }

            if($max_startups<=$total_startups){
                $max_startups =  $total_startups;
            }

            if($max_deals<= $total_deals){
                $max_deals =   $total_deals;
            }

            $totalinvestment +=$infodeal->deal_amount;

            $chartData .= "['".$item->name."',".$total_deals.",".$total_startups.",".$investment."],";

            $chartDataTwo .= "['".$item->name."',".$investment."],";
        }


        return view('frontend.pages.landings.landing',[
            'post'      => $this->latestPost(),
            'startups'  => StartUpModel::count(),
            'investor'  => Investor::count(),
            'hubs'      => Hub::count(),
            'max_investment' => ($max_investment/1000),
            'totalinvestment' => ($totalinvestment/1000),
            'max_startups'=>$max_startups,
            'industry'=>Industry::count(),
            'chartOne'=>$chartData,
            'chartDataTwo'=>$chartDataTwo
        ]);

    }



    public function chartOne(Request $request){


        $totalinvestment = 0;
        $chartData = "['Industry', 'Deals', 'Number Of Company','Investment'],";

        foreach(Industry::get(['id','name']) as $key => $item){
            $startupsIds        = StartUpModel::where('industry',$item->id)->get(['user_id'])->toArray();
            $total_startups     = count($startupsIds);
            $infodeal   = Deal::whereIn('startup_user_id',$startupsIds)->checkDaterange($request)
            ->selectRaw('count(*) as total_deals')
            ->selectRaw('sum(deal_amount) as deal_amount')
            ->first();
            $total_deals = $infodeal->total_deals;
            if($infodeal->deal_amount>0){
                $totalinvestment = $infodeal->deal_amount / 1000;
            }else{
                $totalinvestment = 0;
            }
            $chartData .= "['".$item->name."',".$total_deals.",".$total_startups.",".$totalinvestment."],";
        }
        return view('frontend.pages.landings.landing_chart',[
            'chartOne'=>$chartData,'type'=>1]
        );

    }


    public function chartTwo(Request $request){

        $chartDataTwo = "['Industry','Investment'],";
        foreach(Industry::get(['id','name']) as $key => $item){
            $startupsIds        = StartUpModel::where('industry',$item->id)->get(['user_id'])->toArray();
            $infodeal   = Deal::whereIn('startup_user_id',$startupsIds)->checkDaterange($request)
            ->selectRaw('count(*) as total_deals')
            ->selectRaw('sum(deal_amount) as deal_amount')
            ->first();
            $Investment = ($infodeal->deal_amount?$infodeal->deal_amount:0);
            $chartDataTwo .= "['".$item->name."',".$Investment."],";

        }
        return view('frontend.pages.landings.landing_chart',
            [
                'chartDataTwo'=>$chartDataTwo,
                'type'=>2,
            ]
        );
    }



    public function chartThree(Request $request){

        // $y = "2020";
        // return $dateS = Carbon::createFromFormat('Y',$y)->startOfMonth()->subMonth(2);
        //return Carbon::parse($item['created_at']);

       // return $newDateTime = Carbon::now()->subYear(1)->format('Y');
        // Q1
        $dateS = Carbon::now()->startOfMonth()->subMonth(2);
        $dateE = Carbon::now(); 
        $q1 = $this->Deal($dateS,$dateE,'Q1');

        $q2dateS = Carbon::now()->startOfMonth()->subMonth(5);
        $q2dateE = Carbon::now()->startOfMonth()->subMonth(3); 
        $q2 = $this->Deal($q2dateS,$q2dateE,'Q2');
       

        $q3dateS = Carbon::now()->startOfMonth()->subMonth(9);
        $q3dateE = Carbon::now()->startOfMonth()->subMonth(6);
        $q3 = $this->Deal($q3dateS,$q3dateE,'Q3');
        

        $q4dateS = Carbon::now()->startOfMonth()->subMonth(12);
        $q4dateE = Carbon::now()->startOfMonth()->subMonth(10);
        $q4 = $this->Deal($q4dateS,$q4dateE,'Q4');

        $array = [$q1,$q2,$q3,$q4];

        if($request->mydaterenge==''){
            return  $array = $array;
        }
       


    }

    public function chartFour(Request $request){

        $infodeal   = ProductStage::withCount(['startups', 
        'startups as startups_count'=> function($q)use($request){
            $q->checkDaterange($request);
        }])->get();


        $dataJson = array();
        $datas ='';
        foreach($infodeal as $key => $item){

            $dataJson[] = [
                "country"   => $item->name,
                "value"     => $item->startups_count
            ];
            $datas .= "{country: '".$item->name."',value: ".$item->startups_count."},";
        }

        if($request->mydaterenge==''){
            return  $dataJson;
        }

        return view('frontend.pages.landings.landing_chart',
            [
                'chartDataFour'=>$datas,
                'type'=>4,
            ]
        );

    }

    public function chartFive(Request $request){



        $infodeal   = InvestmentStage::withCount(['startups', 
        'startups as startups_count'=> function($q)use($request){
            $q->checkDaterange($request);
        }])->get();



        $dataJson = array();
        $datas ='';
        foreach($infodeal as $key => $item){
            $dataJson[] = [
                "name"   => $item->name,
                "companies"     => $item->startups_count
            ];
            $datas .= "{name: '".$item->name."',companies: ".$item->startups_count."},";
        }

        if($request->mydaterenge==''){
            return  $dataJson;
        }


        return view('frontend.pages.landings.landing_chart',
            [
                'chartDatafive'=>$datas,
                'type'=>5,
            ]
        );

    }

}
