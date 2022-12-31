<?php

namespace App\Http\Controllers\frontend;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\VerificationEmail;
use Illuminate\Support\Facades\DB;
use Modules\EkoAdmin\Entities\Hub;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Session;
use Modules\EkoAdmin\Entities\Investor;
use Illuminate\Support\Facades\Validator;
use Modules\User\Entities\PasswordSetting;
use Modules\EkoAdmin\Entities\StartUpModel;
use Symfony\Component\HttpFoundation\JsonResponse;

use function GuzzleHttp\json_encode;

class SignUp extends Controller
{

    public function __construct()
    {
        
    }

    public function index(Request $request){

        if($request->all()){

            $request['user_name'] = str_replace(' ', '-', $request->user_name);
            $this->validator($request->all())->validate();

            $passwordSetting = PasswordSetting::firstOrFail();
            $data = $request->except(['password','user_type_id']);
            
            $data['password']       = $request->password . $passwordSetting->salt;
            $data['user_type_id']   = $request->type;
            $data['user_name']      = str_replace(' ', '-', $request->user_name);

            if($result = $this->create($data)){
                $this->storeSetup($result);
                Mail::to($result->email)->queue(new VerificationEmail($result));
            }

            Session::flash('message', "You Account has been created Successfully. please check your mail and verify");
            return redirect()->route('sign-in');
        }

        return view('frontend.auth.__signup');
    }





    public function storeSetup($result)
    {
        
        if($result->user_type_id==3){

            $data = new StartUpModel();
            $dataArray['user_id']       = $result->id;
            $dataArray['name']          = $result->user_name;
            $dataArray['description']   = $result->user_name;
            $dataArray['about']         = $result->user_name;
            $dataArray['address']       = $result->user_name;
            $dataArray['country_id']    = 0;
            $dataArray['no_of_employees'] = 0;
            $dataArray['year_launched'] = date('Y');
            $dataArray['industry']      = 0;
            $info = $data->create($dataArray);
            
            $notification = new Notification();
            $dataN['url']       = url('startup-detail').'/'.$info->uuid;
            $dataN['message']       = 'An Startups Recently SignUp The System';
            $dataN['activities']       = json_encode($dataArray);
            $notification->create($dataN);
        }

        if($result->user_type_id==4){
            
            $data = new Investor();
 
            $dataArray['user_id']       = $result->id;
            $dataArray['company_name']          = $result->user_name;
            $dataArray['country_id']    = 0;
            $dataArray['exits_id']   = $result->user_name;
            $dataArray['investment_stage_id'] = 0;
            $dataArray['year_founded'] = date('Y');
            $dataArray['industry_id']      = 0;
            $dataArray['about']         = $result->user_name;

            $info = $data->create($dataArray);
            $notification = new Notification();
            $dataN['url']       = url('investor-detail').'/'.$info->uuid;
            $dataN['message']       = 'An Investor Recently SignUp The System';
            $dataN['activities']       = json_encode($dataArray);
            $notification->create($dataN);
        }

        if($result->user_type_id==5){
            
            $data = new Hub();
            $dataArray['user_id']       = $result->id;
            $dataArray['name']          = $result->user_name;
            $dataArray['country_id']    = 0;
            $dataArray['num_of_investment'] = 0;
            $dataArray['year_launched'] = date('Y');
            $dataArray['industry_id']      = 0;
            $dataArray['about']         = $result->user_name;
            $dataArray['address']       = $result->user_name;
            $info = $data->create($dataArray);
            $notification = new Notification();
            $dataN['url']       = url('hub-detail').'/'.$info->uuid;
            $dataN['message']       = 'An Hub Recently SignUp The System';
            $dataN['activities']       = json_encode($dataArray);
            $notification->create($dataN);

        }

        if($result->user_type_id==6){
            
           

        }
        
    }




    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    protected function create(array $data)
    {

        return User::create([
            'user_name'         => $data['user_name'],
            'email'             => $data['email'],
            'password'          => Hash::make($data['password']),
            'user_type_id'      => $data['user_type_id'],
            'is_active'         => 0,
            'email_verification_token' => Str::random(32)
        ]);
    }



}
