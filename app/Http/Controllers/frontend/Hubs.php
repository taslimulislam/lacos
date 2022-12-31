<?php

namespace App\Http\Controllers\frontend;

use App\Traits\CommonTrait;
use Illuminate\Http\Request;
use Modules\EkoAdmin\Entities\Hub;
use App\Http\Controllers\Controller;
use Modules\Teams\Entities\TeamMember;
use Modules\UserPanel\Entities\Follow;
use Modules\EkoAdmin\Entities\Industry;
use Modules\UserPanel\Entities\UserTag;
use Modules\UserPanel\Entities\Favorite;
use Modules\UserPanel\Entities\UserNews;
use Modules\EkoAdmin\Entities\CountryModel;
use Modules\EkoAdmin\Entities\InvestmentStage;

class Hubs extends Controller
{
    use CommonTrait;

    public function index(Request $request){

        if($request->keyword!=''){
            $keyword = $request->keyword;
            $HubData = Hub::when($keyword, function ($q) use ($keyword) {
                return $q->where('name', 'LIKE', '%' . $keyword . '%');;
            })
            ->with('industry')->orderBy('id', 'DESC')->paginate(12)->appends('keyword', $keyword);
        }else{
            $HubData = Hub::with('industry')->orderBy('id', 'DESC')->Filter($request)->paginate(12);
        }

        return view('frontend.pages.hubs.hub',[
            'hubs' => $HubData,
            'keyword' => $request->keyword?$request->keyword:'',
            'countries' => CountryModel::cursor(),
            'industries'=>Industry::all(),
            'investstage'=>InvestmentStage::all()
        ]);
    }

    
    public function hubDetail($id){

        $hub = Hub::with('industry')->firstWhere('uuid',$id);

        if(!auth()->user()?->id){
            $followStatus = 0;
            $favoriteStatus = 0;
        }else{
            $followStatus = $this->CheckFollow(auth()->user()->id,$hub->user_id);
            $favoriteStatus = $this->CheckFavarite(auth()->user()->id,$hub->user_id);
        }



        return view('frontend.pages.hubs.__hub_details',[
            'hub' => $hub,
            'followStatus'=>$followStatus,
            'favoriteStatus'=>$favoriteStatus,
            'teams'    => TeamMember::where('user_id',$hub->user_id)->latest('created_at')->cursor(),
            'news'     => UserNews::where('user_id',$hub->user_id)->latest('created_at')->limit(5)->cursor(),
            'tags'    => UserTag::where('user_id',$hub->user_id)->latest('created_at')->cursor(),
            'profileMark'   => $this->ProfileComplete($hub->user_id)
        ]);

    }


}
