<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use App\Traits\CommonTrait;
use App\Models\Notification;
use Illuminate\Http\Request;
use Modules\EkoAdmin\Entities\Hub;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Modules\Teams\Entities\TeamMember;
use Modules\UserPanel\Entities\Follow;
use Modules\EkoAdmin\Entities\Industry;
use Modules\EkoAdmin\Entities\Investor;
use Modules\UserPanel\Entities\UserTag;
use Modules\UserPanel\Entities\Favorite;
use Modules\UserPanel\Entities\UserNews;
use Modules\User\Entities\PasswordSetting;
use Modules\EkoAdmin\Entities\CountryModel;
use Modules\EkoAdmin\Entities\StartUpModel;
use Modules\EkoAdmin\Entities\InvestmentStage;

class StartupController extends Controller
{
    use CommonTrait;
    
    public function index(Request $request){

        if($request->keyword!=''){

            $keyword = $request->keyword;
            
            $startupData = StartUpModel::when($keyword, function ($q) use ($keyword) {
                return $q->where('name', 'LIKE', '%' . $keyword . '%')->orWhere('address', 'LIKE', '%' . $keyword . '%');
            })
            ->orWhereHas('investstage', function( $q ) use ( $keyword ){
                $q->where('name', 'LIKE', '%' . $keyword . '%');
            })
            ->orWhereHas('country', function( $q ) use ( $keyword ){
                $q->where('country_name', 'LIKE', '%' . $keyword . '%');
            })
            ->with('industryadd','country','investstage')
            ->latest()->paginate(12)->appends('keyword', $keyword);
        }else{
            $startupData = StartUpModel::with('industryadd','country','investstage')->Filter($request)->latest()->paginate(12);
        }
        
        return view('frontend.pages.startups.__startup',[
            'startups' => $startupData,
            'keyword' => $request->keyword?$request->keyword:'',
            'countries' => CountryModel::cursor(),
            'industries'=>Industry::all(),
            'investstage'=>InvestmentStage::all()
        ]);

    }


    public function startupDetail($id){

        $StartUp = StartUpModel::with('industryadd','country','investstage')->firstWhere('uuid',$id);


        if(!auth()->user()?->id){
            $followStatus = 0;
            $favoriteStatus = 0;
        }else{
            $followStatus = $this->CheckFollow(auth()->user()->id,$StartUp->user_id);
            $favoriteStatus = $this->CheckFavarite(auth()->user()->id,$StartUp->user_id);
        }


        return view('frontend.pages.startups.__startup_details',[

            'startup'       => $StartUp,
            'followStatus'  => $followStatus,
            'favoriteStatus'=> $favoriteStatus,
            'teams'         => TeamMember::where('user_id',$StartUp->user_id)->latest('created_at')->cursor(),
            'news'          => UserNews::where('user_id',$StartUp->user_id)->latest('created_at')->limit(5)->cursor(),
            'tags'          => UserTag::where('user_id',$StartUp->user_id)->latest('created_at')->cursor(),
            'profileMark'   => $this->ProfileComplete($StartUp->user_id)
        ]);

    }



    public function followUp($id){

        if(!auth()->user()){
            $response = array(
                'success'   => false,
                'title'     => 'Follow',
                'message'   => 'Login First'
            );
            return json_encode($response);
        }

        try {

            $data = array(
                'user_id'       =>  auth()->user()->id,
                'company_id'    =>  $id
            );

            if($exist = Follow::where(['user_id'=>auth()->user()->id,'company_id'=>$id])->first()){
               
                Follow::where('id',$exist->id)->update(['status'=>$exist->status==1?0:1]);
                $response = array(
                    'success'   => true,
                    'title'     => 'Follow',
                    'message'   => 'Your Unfollow Successfull'
                );


                $notification = new Notification();
                $dataN['url']       = '';
                $dataN['message']       = auth()->user()->user_name.' Unfollow Someone';
                $dataN['activities']       = json_encode($data);
                $notification->create($dataN);

            }else{
                Follow::create($data);

                $notification = new Notification();
                $dataN['url']       = '';
                $dataN['message']       = auth()->user()->user_name.' Follow Someone';
                $dataN['activities']       = json_encode($data);
                $notification->create($dataN);

                $response = array(
                    'success'   => true,
                    'title'     => 'Follow',
                    'message'   => 'Your Followed Successfull'
                );
            }

        } catch (\Exception $e) {
            $response = array(
                'success'   => false,
                'title'     => 'Follow',
                'message'   => 'Oops! Something went wrong, Please try again'
            );
        }

        return json_encode($response);

    }


    public function addToFavorite($id){

        if(!auth()->user()){

            $response = array(
                'success'   => false,
                'title'     => 'Favorite',
                'message'   => 'Login First'
            );
            return json_encode($response);
        }

        
        try {

            $data = array(
                'user_id'       =>  auth()->user()->id,
                'company_id'    =>  $id
            );

          
            if($exist = Favorite::where(['user_id'=>auth()->user()->id,'company_id'=>$id])->first()){
               
                Favorite::where('id',$exist->id)->update(['status'=>$exist->status==1?0:1]);
                $response = array(
                    'success'   => true,
                    'title'     => 'Favorite',
                    'message'   => 'Your Successfull'
                );

            }else{
                
                Favorite::create($data);

                $notification = new Notification();
                $dataN['url']       = '';
                $dataN['message']       = auth()->user()->user_name.' Added To Favorite Someone';
                $dataN['activities']       = json_encode($data);
                $notification->create($dataN);

                $response = array(
                    'success'   => true,
                    'title'     => 'Favorite',
                    'message'   => 'Your Favorite Successfull'
                );
            }

        } catch (\Exception $e) {
            $response = array(
                'success'   => false,
                'title'     => 'Favorite',
                'message'   => $e->getMessage()
            );
        }


        return json_encode($response);

    }


    public function startupCreate(Request $request)
    {
        
        return $request->all();
    }



}
