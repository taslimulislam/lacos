<?php

namespace App\Http\Controllers\frontend;

use App\Traits\CommonTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Teams\Entities\TeamMember;
use Modules\UserPanel\Entities\Follow;
use Modules\EkoAdmin\Entities\Industry;
use Modules\EkoAdmin\Entities\Investor;
use Modules\UserPanel\Entities\UserTag;
use Modules\UserPanel\Entities\Favorite;
use Modules\UserPanel\Entities\UserNews;
use Modules\EkoAdmin\Entities\CountryModel;
use Modules\EkoAdmin\Entities\InvestmentStage;

class Investors extends Controller
{

    use CommonTrait;

    public function index(Request $request){

        if($request->keyword!=''){

            $keyword = $request->keyword;
            
            $investorsData = Investor::when($keyword, function ($q) use ($keyword) {
                return $q->where('company_name', 'LIKE', '%' . $keyword . '%');
            })
            ->with(['industry','country','investorType','investmentExit','investmentStage'])
            ->orWhereHas('investmentStage', function( $q ) use ( $keyword ){
                $q->where('name', 'LIKE', '%' . $keyword . '%');
            })
            ->orWhereHas('country', function( $q ) use ( $keyword ){
                $q->where('country_name', 'LIKE', '%' . $keyword . '%');
            })
            ->latest()->paginate(12)->appends('keyword', $keyword);
        }else{
            $investorsData = Investor::with(['industry','investorType','investmentExit','investmentStage'])->Filter($request)->latest()->paginate(12);
        }


        return view('frontend.pages.investors.__investor',[
            'investors' => $investorsData,
            'keyword' => $request->keyword?$request->keyword:'',
            'countries' => CountryModel::cursor(),
            'industries'=>Industry::all(),
            'investstage'=>InvestmentStage::all()
        ]);

    }


    public function InvestorDetail($id){
        

        $Investor = Investor::with(['country','industry','investorType','investmentExit','investmentStage'])->firstWhere('uuid',$id);

        if(!auth()->user()?->id){
            $followStatus = 0;
            $favoriteStatus = 0;
        }else{
            $followStatus = $this->CheckFollow(auth()->user()->id,$Investor->user_id);
            $favoriteStatus = $this->CheckFavarite(auth()->user()->id,$Investor->user_id);
        }

        
        return view('frontend.pages.investors.__investor_details',[
            'investor' => $Investor,
            'followStatus'=>$followStatus,
            'favoriteStatus'=>$favoriteStatus,
            'teams'    => TeamMember::where('user_id',$Investor->user_id)->latest('created_at')->cursor(),
            'news'     => UserNews::where('user_id',$Investor->user_id)->latest('created_at')->limit(5)->cursor(),
            'tags'    => UserTag::where('user_id',$Investor->user_id)->latest('created_at')->cursor(),
            'profileMark'   => $this->ProfileComplete($Investor->user_id)
        ]);

    }


}
