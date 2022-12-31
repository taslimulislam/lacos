<?php

namespace Modules\UserPanel\Http\Controllers;

use App\Traits\CommonTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Teams\Entities\TeamMember;
use Modules\UserPanel\Entities\Follow;
use Modules\EkoAdmin\Entities\Industry;
use Modules\UserPanel\Entities\UserTag;
use Modules\UserPanel\Entities\Favorite;
use Modules\UserPanel\Entities\UserNews;
use Illuminate\Support\Facades\Validator;
use Modules\EkoAdmin\Entities\CountryModel;
use Modules\EkoAdmin\Entities\StartUpModel;
use Modules\EkoAdmin\Entities\DocumentsModel;
use Modules\EkoAdmin\Entities\InvestmentStage;

class StartupController extends Controller
{

    use CommonTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $startup = $this->ProfileInfo(3,auth()->user()->id);
        
        return view('userpanel::pages.__overview',[

            'info'          => $startup,
            'startup_docs'  => $this->DocumentsModel($startup->id,'startup'),
            'teams'         => $this->TeamMember(auth()->user()->id),
            'news'          => $this->UserNews(auth()->user()->id),
            'tags'          => $this->UserTag(auth()->user()->id),
            'favorites'     => $this->Favorite(auth()->user()->id),
            'follows'       => $this->Follow(auth()->user()->id),
            'profileMark'   => $this->ProfileComplete(auth()->user()->id),
            
            'countries'     => CountryModel::all(),
            'industries'    => Industry::all(),
            'investstage'   => InvestmentStage::all()
            
        ]);



    }


    

    public function updateStartupProfile(Request $request)
    {
        

        $validate = Validator::make($request->all(),
        [
            'name'          => 'required',
            'description'   => 'required',
            'about'         => 'required',
            'address'       => 'required',
            'country_id'    => 'required',
            'no_of_employees'   => 'required',
            'year_launched'     => 'required',
            'industry'          => 'required',
            'startup_logo'      => 'image|mimes:jpeg,png,jpg,gif,svg',
            'document_upload.*' => 'file|mimes:PDF,pdf,docx,jpeg,png,jpg',
        ],
        ['required' => ':attribute is required']);

       
        if($validate->fails()){
            return   json_encode([  
                'success'  => false,
                'title'     =>'Startup',
                'message'  => $validate->errors()->first() 
            ]);
        }

        $count = str_word_count($request->about);

        if($count >=500){
            return   json_encode([  
                'success'  => false,
                'title'     =>'Startup',
                'message'  => 'About section should be  maximum 500 words' 
            ]);
        }

        try {

            DB::beginTransaction();
            $data = StartUpModel::firstWhere('user_id',auth()->user()->id);


            if($request->file('startup_logo')){
                $file = $request->file('startup_logo');
                $file_name = 'startup_logo'.time().'.'.$file->getClientOriginalExtension();
                $destinationPath = storage_path('app/public/startups');
                $file->move($destinationPath,$file_name);
                $request->merge(['logo' => $file_name]);
            }

            StartUpModel::updateOrCreate(
                ['id' =>  @$data->id], $request->all()
            );

            if(isset($request->document_title)):
                for ($i = 0; $i < sizeof($request->document_title); $i++) {
                    if ($request->document_upload[$i] != null) {

                        $file = $request->document_upload[$i];
                        $file_name = 'startup_doc'.time().rand(10,100000).'.'.$file->getClientOriginalExtension();
                        $destinationPath = storage_path('app/public/startups');
                        $file->move($destinationPath,$file_name);

                        $document = new DocumentsModel();
                        $document->title = $request->document_title[$i];
                        $document->file_identifier_id = $data->id;
                        $document->file_identifier = 'startup';
                        $document->file = $file_name;
                        $document->save();
                    }
                }

            endif;

            DB::commit();

            $response = array(
                'success'  =>true,
                'title'     =>'Startup Profile',
                'message'  => 'Startups is update successfully'
            );

        } catch (\Exception $e) {

            DB::rollBack();
            $response = array(
                'success'  =>false,
                'title'     =>'Startup Profile',
                'message'  => $e->getMessage()
            );
        }
        return json_encode($response);
    }

    
}
