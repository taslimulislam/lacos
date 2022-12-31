<?php

namespace Modules\Cms\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Cms\Entities\CmsSetting;
use Illuminate\Contracts\Support\Renderable;

class CmsController extends Controller
{
   
    public function index()
    {
        return view('cms::index');
    }
    
    public function privacyPolicy()
    {
        return view('cms::websetup.__privacy_policy',[
            'CmsSetting'=> CmsSetting::firstWhere('id',3)
        ]);
    }
    


    public function updatePrivacyPolicy(Request $request)
    {

        $id = $request->id;
        $websetup = CmsSetting::firstWhere('id',$id);
        $data = $request->all();
        $CmsSetting['event'] = 'Privacy-Policy';
        $CmsSetting['details'] = json_encode($data);

        
        if($websetup){

            CmsSetting::where('id',$id)->update($CmsSetting);
            $response = array(
                'success'  =>true,
                'title'=>'Privacy-Policy',
                'message'  => 'Update successfully'
            );
            return json_encode($response);

        }else{

            CmsSetting::create($CmsSetting);
            $response = array(
                'success'  =>true,
                'title'=>'Privacy-Policy',
                'message'  => 'Added successfully'
                
            );
            return json_encode($response);
        }
    }


    
    public function makeReadAll()
    {

            Notification::whereNull('read')->update(['read'=>time()]);
            $response = array(
                'success'  =>true,
                'title'=>'Notification',
                'message'  => 'Read successfully'
            );
            return json_encode($response);

       
    }

    
}
