<?php

namespace Modules\UserPanel\Http\Controllers;

use App\Models\User;
use App\Traits\CommonTrait;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\EkoAdmin\Entities\Hub;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Teams\Entities\TeamMember;
use Modules\UserPanel\Entities\Follow;
use Illuminate\Support\Facades\Session;
use Modules\EkoAdmin\Entities\Investor;
use Modules\UserPanel\Entities\UserTag;
use Modules\UserPanel\Entities\Favorite;
use Modules\UserPanel\Entities\UserNews;
use Illuminate\Support\Facades\Validator;
use Modules\UserPanel\Entities\UserEvent;
use Modules\User\Entities\PasswordSetting;
use Modules\EkoAdmin\Entities\StartUpModel;

use Modules\UserPanel\Entities\EventSpeaker;
use Modules\EkoAdmin\Entities\DocumentsModel;
use Modules\UserPanel\Entities\ReportInvoice;


class UserPanelController extends Controller
{

    use CommonTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function index()
    {

        if(auth()->user()->user_type_id == 1){
            return redirect()->intended('home');
        } else if(auth()->user()->user_type_id == 3) {
            return redirect()->route('userpanel.startup');
        }
        else if(auth()->user()->user_type_id == 4) {
            return redirect()->route('userpanel.investor');
        }
        else if(auth()->user()->user_type_id == 5) {
            return redirect()->route('userpanel.hub');
        }
        else if(auth()->user()->user_type_id == 6) {
            return redirect()->route('userpanel.guest');
        }

    }



    public function destroyDoc($doc_id)
    {
        $doc = DocumentsModel::where('uuid',$doc_id)->first();
        unlink(storage_path('app/public/startups/'.$doc->file));
        $doc->delete();
        $response = array(
            'success'  =>true,
            'title'     =>'Document',
            'message'  => 'Delete successfully'
        );
        return json_encode($response);
    }


    
    public function teamList()
    {
        
        
        return view('userpanel::pages.__team_list',[
            'info' =>  $this->ProfileInfo(auth()->user()->user_type_id,auth()->user()->id),
            'teams'         => TeamMember::where('user_id',auth()->user()->id)->cursor(),
            'profileMark'   => $this->ProfileComplete(auth()->user()->id)
        ]);
        
    }



    public function addMember(Request $request)
    {

        $validate = Validator::make($request->all(),
        [
            'name' => 'required|string|between:2,100',
            'position' => 'required',
            'about' => 'required',
        ],
        ['required' => ':attribute is required']);


        if($validate->fails()){
            return   json_encode([  
                'success'  => false,
                'title'     =>'News',
                'message'  => $validate->errors()->first() 
            ]);
        }

        // $count = str_word_count($request->about);
        // if($count < 250 || $count > 499){
        //     return   json_encode([  
        //         'success'  => false,
        //         'title'     =>'Startup',
        //         'message'  => 'About section should be minimum 250 words and maximum 500 words' 
        //     ]);
        // }


        $teamData = array(
            'user_id'   => auth()->user()->id,
            'name'      => $request->name,
            'position'     => $request->position,
            'about'     => $request->about
        );

        if ($request->file('image')) {
            $request_file = $request->file('image');
            $filename     = time() . rand(10, 1000) . '.' . $request_file->extension();
            $path         = $request_file->storeAs('user-team', $filename, 'public');
            $teamData['image'] = $path;
        }

       

        TeamMember::create($teamData);

        $response = array(
            'success'  =>true,
            'title'     =>'Member',
            'message'  => 'Added successfully'
        );
        
        return json_encode($response);
    }


    public function editMember($id)
    {
        $data =  TeamMember::firstWhere('id',$id);
        return json_encode($data);
    }


    public function updateMember(Request $request, $id)
    {

        $validate = Validator::make($request->all(),
        [
            'name' => 'required|string|between:2,100',
            'position' => 'required',
            'about' => 'required',
            'image' => 'mimes:jpeg,png,jpg',
        ],
        ['required' => ':attribute is required']);


        if($validate->fails()){
            return   json_encode([  
                'success'  => false,
                'title'     =>'News',
                'message'  => $validate->errors()->first() 
            ]);
        }

        $count = str_word_count($request->about);
        if($count < 250 || $count > 499){
            return   json_encode([  
                'success'  => false,
                'title'     =>'Startup',
                'message'  => 'About section should be minimum 250 words and maximum 500 words' 
            ]);
        }

        $teamData = array(
            'user_id'   => auth()->user()->id,
            'name'      => $request->name,
            'position'     => $request->position,
            'about'     => $request->about
        );

        if ($request->file('image')) {
            $request_file = $request->file('image');
            $filename     = time() . rand(10, 1000) . '.' . $request_file->extension();
            $path         = $request_file->storeAs('user-team', $filename, 'public');
            $teamData['image'] = $path;
        }


        TeamMember::where('id',$id)->update($teamData);

        $response = array(
            'success'  =>true,
            'title'     =>'Team',
            'message'  => 'Update successfully'
        );
        
        return json_encode($response);


    }

  
    public function deleteMember($id)
    {

        try {
            $data = TeamMember::firstWhere('id',$id);
            if($data->delete()){
                $response = array(
                    'success'   => true,
                    'title'     => 'Team',
                    'message'   => 'Delete Successfully'
                );
            }
            return json_encode($response);
            
        } catch (\Exception $e){
            $response = array(
                'success'   => false,
                'title'     => 'Team',
                'message'   => 'Deleted failed'
            );
            return json_encode($response);
        }
    }



    public function newsList()
    {
        
        return view('userpanel::pages.__news_list',[
            'info' =>  $this->ProfileInfo(auth()->user()->user_type_id,auth()->user()->id),
            'news'    => UserNews::where('user_id',auth()->user()->id)->cursor(),
            'profileMark'   => $this->ProfileComplete(auth()->user()->id)
        ]);
    }


    public function tagList()
    {
        

        return view('userpanel::pages.__tag_list',[
            'info' =>  $this->ProfileInfo(auth()->user()->user_type_id,auth()->user()->id),
            'tags'    => UserTag::where('user_id',auth()->user()->id)->cursor(),
            'profileMark'   => $this->ProfileComplete(auth()->user()->id)
        ]);
    }




    public function reportList()
    {
        

        return view('userpanel::pages.__report_list',[
            'info' =>  $this->ProfileInfo(auth()->user()->user_type_id,auth()->user()->id),
            'buyreports' =>   ReportInvoice::with('report')->where(['user_id'=>auth()->user()->id])->get(),
            'profileMark'   => $this->ProfileComplete(auth()->user()->id)
        ]);
    }




    public function eventList()
    {
       
        return view('userpanel::pages.__event_list',[
            'info' =>  $this->ProfileInfo(auth()->user()->user_type_id,auth()->user()->id),
            'events' =>   UserEvent::where(['user_id'=>auth()->user()->id])->get(),
            'profileMark'   => $this->ProfileComplete(auth()->user()->id)
        ]);
    }



    
    public function addEvent(Request $request)
    {


        $validate = Validator::make($request->all(),
        [
            'event_title' => 'required',
            'description' => 'required|string|min:250|max:500',
            'start_date' => 'required',
            'end_date' => 'required',
            'link' => 'required',
            'speaker_image.*' => 'mimes:jpeg,png,jpg',
            'image' => 'mimes:jpeg,png,jpg',
        ],
        ['required' => ':attribute is required']);


        if($validate->fails()){
            return   json_encode([  
                'success'  => false,
                'title'     =>'News',
                'message'  => $validate->errors()->first() 
            ]);
        }


        try {

            DB::beginTransaction();

            if ($request->file('image')) {
                $request_file = $request->file('image');
                $filename     = time() . rand(10, 1000) . '.' . $request_file->extension();
                $path         = $request_file->storeAs('event-image', $filename, 'public');
                $eventData['image'] = $path;
            }


            $eventData['user_id'] = auth()->user()->id;
            $eventData['event_title'] = $request->event_title;
            $eventData['description'] = $request->description;
            $eventData['start_date'] = $request->start_date;
            $eventData['end_date'] = $request->end_date;
            $eventData['link'] = $request->link;
            $eventData['status'] = 0;

            $data = UserEvent::create($eventData);

            if(isset($request->speaker_name)):

                for ($i = 0; $i < sizeof($request->speaker_name); $i++) {

                    if ($request->speaker_image[$i] != null) {

                        $file = $request->speaker_image[$i];
                        $file_name = 'speaker_image'.time().rand(10,100000).'.'.$file->getClientOriginalExtension();
                        $destinationPath = storage_path('app/public/speaker');
                        $file->move($destinationPath,$file_name);
                        $speaker = new EventSpeaker();
                        $speaker->user_event_id = $data->id;
                        $speaker->speaker_name = $request->speaker_name[$i];
                        $speaker->speaker_position = $request->speaker_position[$i];
                        $speaker->speaker_image = $file_name;
                        $speaker->save();
                    }
                }

            endif;

            $notification = new Notification();
            $dataN['url']       = url('event-details').'/'.$data->uuid;
            $dataN['message']       = 'New Event Added Successfully';
            $dataN['activities']       = json_encode($data);
            $notification->create($dataN);

            $response = array(
                'success'  =>true,
                'title'     =>'Event',
                'message'  => 'Added successfully'
            );

            DB::commit();
        } catch (\Exception $e) {

            DB::rollBack();
            $response = array(
                'success'  =>false,
                'title'     =>'Hib Profile',
                'message'  => $e->getMessage()
            );
        }

        return json_encode($response);

    }



    public function editEvent($id)
    {
        $data =  UserEvent::firstWhere('uuid',$id);
        $speakers = EventSpeaker::where('user_event_id',$data->id)->get();
        $speaker ='';
        foreach($speakers as $key=>$s){
            $speaker .='<tr id="trid_'.$key.'">
                <td >'.$s->speaker_name.'</td>
                <td>'.$s->speaker_position.'</td>
                <td>
                    <img src="'.url('/public/storage/speaker').'/'.$s->speaker_image.'" class="w-5 align-self-center" width="50" />
                </td>

                <td>
                    <a href="javascript:void(0)" data-tr-id="trid_'.$key.'" delete-speaker-route="'.route('userpanel.delete.event.speaker',$s->id).'" class="btn btn-danger deleteSpeaker"><i class="fa fa-trash"></i></a>
                </td>
            </tr>';
        }

        $data['speaker'] = $speaker;

        return json_encode($data);

    }


    

    
    public function updateEvent(Request $request,$id)
    {


        $validate = Validator::make($request->all(),
        [
            'event_title' => 'required',
            'description' => 'required|string|min:250|max:500',
            'start_date' => 'required',
            'end_date' => 'required',
            'link' => 'required',
            'image' => 'mimes:jpeg,png,jpg',
            'speaker_image.*' => 'mimes:jpeg,png,jpg',

        ],
        ['required' => ':attribute is required']);


        if($validate->fails()){
            return   json_encode([  
                'success'  => false,
                'title'     =>'Event',
                'message'  => $validate->errors()->first() 
            ]);
        }

        if ($request->file('image')) {
            $request_file = $request->file('image');
            $filename     = time() . rand(10, 1000) . '.' . $request_file->extension();
            $path         = $request_file->storeAs('event-image', $filename, 'public');
            $eventData['image'] = $path;
        }

        $eventData['event_title'] = $request->event_title;
        $eventData['description'] = $request->description;
        $eventData['start_date'] = $request->start_date;
        $eventData['end_date'] = $request->end_date;
        $eventData['link'] = $request->link;

        $data = UserEvent::firstWhere('uuid',$id);

        UserEvent::where('uuid',$id)->update($eventData);

        if(isset($request->speaker_name)):

            for ($i = 0; $i < sizeof($request->speaker_name); $i++) {

                if ($request->speaker_image[$i] != null) {

                    $file = $request->speaker_image[$i];
                    $file_name = 'speaker_image'.time().rand(10,100000).'.'.$file->getClientOriginalExtension();
                    $destinationPath = storage_path('app/public/speaker');
                    $file->move($destinationPath,$file_name);
                    $speaker = new EventSpeaker();
                    $speaker->user_event_id = $data->id;
                    $speaker->speaker_name = $request->speaker_name[$i];
                    $speaker->speaker_position = $request->speaker_position[$i];
                    $speaker->speaker_image = $file_name;
                    $speaker->save();
                }
            }

        endif;

        $response = array(
            'success'  =>true,
            'title'     =>'Event',
            'message'  => 'Update successfully'
        );
        
        return json_encode($response);
    }


    public function deleteEvent($id)
    {

        try {

            $data = UserEvent::firstWhere('uuid',$id);
            if($data->delete()){
                $response = array(
                    'success'   => true,
                    'title'     => 'Event',
                    'message'   => 'Delete Successfully'
                );
            }
            return json_encode($response);
            
        } catch (\Exception $e){

            $response = array(
                'success'   => false,
                'title'     => 'Event',
                'message'   => 'Deleted failed'
            );
            return json_encode($response);

        }

    }



    public function deleteSpeaker($id)
    {

        try {

            $data = EventSpeaker::firstWhere('id',$id);

            if($data->delete()){
                $response = array(
                    'success'   => true,
                    'title'     => 'Event Speaker',
                    'message'   => 'Delete Successfully'
                );
            }
            return json_encode($response);
            
        } catch (\Exception $e){
            $response = array(
                'success'   => false,
                'title'     => 'Event Speaker',
                'message'   => 'Deleted failed'
            );
            return json_encode($response);
        }
    }

    
    public function addTag(Request $request)
    {


        $validate = Validator::make($request->all(),
        [
            'tag_name' => 'required',
        ],
        ['required' => ':attribute is required']);


        if($validate->fails()){
            return   json_encode([  
                'success'  => false,
                'title'     =>'Tag',
                'message'  => $validate->errors()->first() 
            ]);
        }

        $tag['user_id'] = auth()->user()->id;
        $tag['tag_name'] = $request->tag_name;

        UserTag::create($tag);

        $response = array(
            'success'  =>true,
            'title'     =>'Tag',
            'message'  => 'Added successfully'
        );
        
        return json_encode($response);
    }



    public function deleteTag($id)
    {

        try {
            $data = UserTag::firstWhere('id',$id);
            if($data->delete()){
                $response = array(
                    'success'   => true,
                    'title'     => 'Tag',
                    'message'   => 'Delete Successfully'
                );
            }
            return json_encode($response);
            
        } catch (\Exception $e){
            $response = array(
                'success'   => false,
                'title'     => 'Tag',
                'message'   => 'Deleted failed'
            );
            return json_encode($response);
        }

       
    }



    public function newsCreate(Request $request)
    {


        $validate = Validator::make($request->all(),
        [
            'news_title' => 'required|string|between:2,100',
            'news_link' => 'required',
            'image' => 'mimes:jpeg,png,jpg',
            'description' => 'required|string|min:250|max:500',
        ],
        ['required' => ':attribute is required']);


        if($validate->fails()){
            return   json_encode([  
                'success'  => false,
                'title'     =>'News',
                'message'  => $validate->errors()->first() 
            ]);
        }
        $newsData = array();

        if ($request->file('image')) {
            $request_file = $request->file('image');
            $filename     = time() . rand(10, 1000) . '.' . $request_file->extension();
            $path         = $request_file->storeAs('user-news', $filename, 'public');
            $newsData['news_image']    = $path;
        }
        $newsData['user_id']           = auth()->user()->id;
        $newsData['news_title']        = $request->news_title;
        $newsData['news_link']         = $request->news_link;
        $newsData['description']       = $request->description;

        UserNews::create($newsData);

        $response = array(
            'success'  =>true,
            'title'     =>'News',
            'message'  => 'Added successfully'
        );
        
        return json_encode($response);
    }



    public function editNews($id)
    {
        $data =  UserNews::firstWhere('id',$id);
        return json_encode($data);
    }


    public function updateNews(Request $request, $id)
    {

        $validate = Validator::make($request->all(),
        [
            'news_title' => 'required|string|between:2,100',
            'news_link' => 'required',
            'image' => 'mimes:jpeg,png,jpg',
            'description' => 'required|string|min:250|max:500',
        ],
        ['required' => ':attribute is required']);



        if($validate->fails()){
            return   json_encode([  
                'success'  => false,
                'title'     =>'News',
                'message'  => $validate->errors()->first() 
            ]);
        }

        $newsData = array();

        if ($request->file('image')) {
            $request_file = $request->file('image');
            $filename     = time() . rand(10, 1000) . '.' . $request_file->extension();
            $path         = $request_file->storeAs('user-news', $filename, 'public');
            $newsData['news_image']    = $path;
        }
        $newsData['user_id']           = auth()->user()->id;
        $newsData['news_title']        = $request->news_title;
        $newsData['news_link']         = $request->news_link;
        $newsData['description']       = $request->description;
      



        UserNews::where('id',$id)->update($newsData);

        $response = array(
            'success'  =>true,
            'title'     =>'News',
            'message'  => 'Update successfully'
        );
        
        return json_encode($response);


    }

  
    public function deleteNews($id)
    {

        try {
            $data = UserNews::firstWhere('id',$id);
            if($data->delete()){
                $response = array(
                    'success'   => true,
                    'title'     => 'News',
                    'message'   => 'Delete Successfully'
                );
            }
            return json_encode($response);
            
        } catch (\Exception $e){
            $response = array(
                'success'   => false,
                'title'     => 'News',
                'message'   => 'Deleted failed'
            );
            return json_encode($response);
        }

       
    }

    
    public function deleteFollow($id)
    {

        try {
            $data = Follow::firstWhere('id',$id);
            if($data->delete()){
                $response = array(
                    'success'   => true,
                    'title'     => 'Follow',
                    'message'   => 'Delete Successfully'
                );
            }
            return json_encode($response);
            
        } catch (\Exception $e){
            $response = array(
                'success'   => false,
                'title'     => 'Follow',
                'message'   => 'Deleted failed'
            );
            return json_encode($response);
        }

       
    }

    
    public function deleteFavorite($id)
    {

        try {

            $data = Favorite::firstWhere('id',$id);
            
            if($data->delete()){
                $response = array(
                    'success'   => true,
                    'title'     => 'Favorite',
                    'message'   => 'Delete Successfully'
                );
            }
            return json_encode($response);
            
        } catch (\Exception $e){
            $response = array(
                'success'   => false,
                'title'     => 'Favorite',
                'message'   => 'Deleted failed'
            );
            return json_encode($response);
        }

       
    }



    public function passwordSettings()
    {

        return view('userpanel::pages.__password_satting',[
            'info' =>  $this->ProfileInfo(auth()->user()->user_type_id,auth()->user()->id),
            'events' =>   UserEvent::where(['user_id'=>auth()->user()->id])->get(),
            'profileMark'   => $this->ProfileComplete(auth()->user()->id)
        ]);
        
    }


    
    public function updatePassword(Request $request){

        if($request->all()){
            $request->validate([
                'current_password' => 'required',
                'new_password' => 'required', 'string', 'min:8', 'confirmed',
            ]);
            $passwordSetting = PasswordSetting::firstOrFail();
            $newpassword = $request->new_password . $passwordSetting->salt;
            $data['password'] = $request->current_password . $passwordSetting->salt;
            $data['id'] = auth()->user()->id;
           // return Hash::check($data['password'], auth()->user()->password);
            if(Auth::attempt($data)){
                User::find(auth()->user()->id)->update(['password'=> Hash::make($newpassword)]);
                Session::flash('message', "Password Change Successfully, You have signed-in");
            }else{
                Session::flash('exception', "Current Password Did Not Match, Please Try Again");
            }
            return redirect()->route('userpanel.password.setting');
        }

    }

}
