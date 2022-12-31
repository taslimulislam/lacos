<?php
namespace App\Traits;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Notification;
use Modules\Cms\Entities\Post;
use Modules\EkoAdmin\Entities\Hub;
use Modules\EkoAdmin\Entities\Deal;
use Intervention\Image\Facades\Image;
use Modules\Teams\Entities\TeamMember;
use Modules\UserPanel\Entities\Follow;
use Illuminate\Support\Facades\Storage;
use Modules\EkoAdmin\Entities\Investor;
use Modules\UserPanel\Entities\UserTag;
use Modules\UserPanel\Entities\Favorite;
use Modules\UserPanel\Entities\UserNews;
use Modules\UserPanel\Entities\UserEvent;
use Modules\EkoAdmin\Entities\StartUpModel;
use Modules\EkoAdmin\Entities\DocumentsModel;

trait CommonTrait{

    public function NotificationActivity($data)
    {
        return Notification::ceate($data);
    }

    private function latestPost()
    {

        $posts  = Post::with('user','category')->latest('created_at')->limit(5)->get();
        $PN = array();
        $i = 1;
        foreach ($posts as $key => $item) {
            @$PN['category_' . $i]    = $item->category->category_name;
            @$PN['title_' . $i]    = $item->title;
            @$PN['content_' . $i]  = $item->content;
            @$PN['link_' . $i]     = url('post-detail',$item->uuid);
            @$PN['image_' . $i]    = getImage($item->post_image);
            @$PN['post_date_'.$i]   = Carbon::parse($item->created_at)->diffForhumans();
            $PN['author_name_'.$i] = @$item->user->user_name;
            $PN['author_image_'.$i] = getImage($item->post_image);
            $PN['author_about_'.$i] = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries';
            $i++;
        }
        return $PN;
    }


    private function deleteFile($path)
    {
        if(Storage::exists('public/'.$path)) {
            Storage::delete('public/'.$path);
        }
    }

    private function basicUpload($image,$destination,$size=null){

        if($image=='' || $destination==''){
           return false; 
        }else{
            $request_file = $image;
            $filename     = time() . rand(10, 1000) . '.' . $request_file->extension();
            $path         = $request_file->storeAs($destination, $filename, 'public');
            return $path;
        }
    }



    private function advanceUpload($image,$sizes=[],$directory=[]){

        if($image=='' || !empty($directory)){
            return false; 
         }else{
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $k = 0;
            foreach ($sizes as $w => $h) {
                $destination = public_path($directory[$k]);
                $imgFile = Image::make($image->getRealPath());
                $imgFile->resize($w, $h, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $canvas = Image::canvas($w, $h);
                $canvas->insert($imgFile, 'center');
                $canvas->save($destination.'/'.$imageName);
                $k++;
            }
            return $imageName;
        }

    }


    public function getDetail($user_id)
    {
        $mark=0;
        if(TeamMember::where('user_id',$user_id)->count()>0){
            $mark =  $mark+10;
        }

        if(UserNews::where('user_id',$user_id)->count()>0){
            $mark =  $mark+10;
        }

        if(Favorite::where('user_id',$user_id)->count()>0){

            $mark =  $mark+10;
        }
        
        if(Follow::where('user_id',$user_id)->count()>0){

            $mark =  $mark+10;
        }

        return $mark;
    }


    public function ProfileComplete($user_id){

        $mark = 10;
        $info = User::firstWhere('id',$user_id);
        
       
        if(@$info->user_type_id==3){
            $getData = StartUpModel::firstWhere('user_id',$info->id);
            if(@$getData->logo){
                $mark =  $mark+50;
            }
        }

        if(@$info->user_type_id==4){
            $getData = Investor::firstWhere('user_id',$info->id);
            if(@$getData->logo){
                $mark =  $mark+50;
            }
        }

        if(@$info->user_type_id==5){
            $getData = Hub::firstWhere('user_id',$info->id);
            if(@$getData->logo){
                $mark =  $mark+50;
            }
        }
        return  $total = $mark + $this->getDetail(@$info->id);

    }



    public function CheckFavarite($user_id,$company_id)
    {
        if(Favorite::where(['user_id'=>$user_id,'company_id'=>$company_id])->first()?->status==1){
            return 1;
        }else{
            return 0; 
        }
    }

    
    public function CheckFollow($user_id,$company_id)
    {
        if(Follow::where(['user_id'=>$user_id,'company_id'=>$company_id])->first()?->status==1){
            return 1;
        }else{
            return 0; 
        }
        
    }


    
    public function Favorite($user_id)
    {
        return Favorite::with('investor','startup')->where('user_id',$user_id)->latest()->limit(6)->get();
    }

    public function Follow($user_id)
    {
        return  Follow::with('investor','startup')->where('user_id',$user_id)->latest()->latest()->limit(6)->get();
    }


    public function DocumentsModel($id,$company)
    {
        return DocumentsModel::where('file_identifier_id',$id)->where('file_identifier',$company)->latest()->get();
    }

    public function TeamMember($user_id)
    {
        return  TeamMember::where('user_id',$user_id)->latest()->latest()->limit(6)->get();
    }

    public function UserNews($user_id)
    {
        return  UserNews::where('user_id',$user_id)->latest()->latest()->limit(6)->get();
    }

    public function UserTag($user_id)
    {
        return  UserTag::where('user_id',$user_id)->latest()->latest()->limit(6)->get();
    }


    public function ProfileInfo($user_type_id,$user_id)
    {
        
        if($user_type_id == 5){
            $info = Hub::with('industry')->firstWhere('user_id',$user_id);
        }
        if($user_type_id == 4){
            $info = Investor::with(['industry','investorType','investmentExit','investmentStage'])->where('user_id',$user_id)->first();
        }
        if($user_type_id == 3){
            $info = StartUpModel::with('industryadd','country')->where('user_id',$user_id)->first();
        }

        return $info;
    }


    public function scopeCheckDaterange($query,$request)
    {
        if(!empty($request->mydaterenge)){
            $dateRange = explode("/",$request->mydaterenge);
            $startdate = $dateRange[0];
            $enddate = $dateRange[1];
            $query->whereDate('created_at','>=', $startdate);
            $query->whereDate('created_at','<=', $enddate);
        }

        return $query;

    }

    
    public function Deal($dateS,$dateE,$Q)
    {

        $Q1 = Deal::whereBetween('created_at',[$dateS,$dateE])
        ->selectRaw('count(*) as Deals')
        ->selectRaw('sum(deal_amount) as Investment')
        ->first();
        $Investment = ($Q1->Investment?$Q1->Investment:0) / 1000;
        $q1 = array("year"=> "$Q","Deals"=> $Q1->Deals,"Investment"=> $Investment );
        return $q1;

    }



}
