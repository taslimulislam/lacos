<?php

namespace Modules\UserPanel\Http\Controllers;

use App\Traits\CommonTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\EkoAdmin\Entities\Hub;
use Modules\Teams\Entities\TeamMember;
use Modules\UserPanel\Entities\Follow;
use Modules\EkoAdmin\Entities\Industry;
use Modules\EkoAdmin\Entities\Investor;
use Modules\UserPanel\Entities\UserTag;
use Modules\UserPanel\Entities\Favorite;
use Modules\UserPanel\Entities\UserNews;
use Illuminate\Support\Facades\Validator;
use Modules\EkoAdmin\Entities\CountryModel;
use Modules\EkoAdmin\Entities\InvestorType;
use Modules\EkoAdmin\Entities\DocumentsModel;
use Modules\EkoAdmin\Entities\InvestmentExit;
use Modules\EkoAdmin\Entities\InvestmentStage;

class HubsController extends Controller
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

        $hub = Hub::with('industry')->firstWhere('user_id',auth()->user()->id);

        // return Favorite::with('investor','startup')->where('user_id',auth()->user()->id)->paginate(6);


        return view('userpanel::pages.__hubs_overview',[

            'info'          => $hub,
            'info_docs'     => $this->DocumentsModel($hub->id,'hubs'),
            'teams'         => $this->TeamMember(auth()->user()->id),
            'news'          => $this->UserNews(auth()->user()->id),
            'tags'          => $this->UserTag(auth()->user()->id),
            'favorites'     => $this->Favorite(auth()->user()->id),
            'follows'       => $this->Follow(auth()->user()->id),
            'profileMark'   => $this->ProfileComplete(auth()->user()->id),
        
            'countries'     => CountryModel::all(),
            'industries'    => Industry::all(),
            'investexit'    => InvestmentExit::all(),
            'investstage'   => InvestmentStage::all(),
            'investortype'  => InvestorType::all(),
            
        ]);

    }


    public function updateHubProfile(Request $request){


        $validate = Validator::make($request->all(),
        [
           "name"          => 'required',
            "country_id"    => 'required',
            "industry_id"   => 'required',
            "num_of_investment" => 'required',
            "address"       => 'required',
            "web_link"      => 'required',
            "year_launched" => 'required',
            "logo"          => 'image|mimes:jpeg,png,jpg',
            "about"         => 'required',
            'document_upload.*' => 'file|mimes:PDF,pdf,docx,jpeg,png,jpg',
        ],
        ['required' => ':attribute is required']);


        if($validate->fails()){

            return  json_encode([  
                'success'  => false,
                'title'     =>'News',
                'message'  => $validate->errors()->first() 
            ]);
        }

        $count = str_word_count($request->about);
        if($count >=500){
            return   json_encode([  
                'success'  => false,
                'title'     =>'Startup',
                'message'  => 'About section should be maximum 500 words' 
            ]);
        }


        try {

            DB::beginTransaction();
            $hub = Hub::firstWhere('user_id',auth()->user()->id);

            $input = $request->all();

            if ($request->hasFile('logo')) {

                if (!empty($hub['logo'])) {
                    $imagePath = 'public/storage/hub/'.$hub['logo'];
                    if(file_exists($imagePath)) {
                        unlink($imagePath); //delete from storage
                    }
                }
                $request_file = $request->file('logo');
                $filename     = time() . rand(10, 1000) . '.' . $request_file->extension();
                $path         = $request_file->storeAs('hub', $filename, 'public');
                $input['logo'] = "$path";
            }else{
                unset($input['logo']);
            }
            
            $hub->update($input);

            if(isset($request->document_title)):
                for ($i = 0; $i < sizeof($request->document_title); $i++) {
                    if ($request->document_upload[$i] != null) {
                        $file = $request->document_upload[$i];
                        $file_name = 'hub_doc'.time().rand(10,100000).'.'.$file->getClientOriginalExtension();
                        $destinationPath = storage_path('app/public/hub');
                        $file->move($destinationPath,$file_name);

                        $document = new DocumentsModel();
                        $document->title = $request->document_title[$i];
                        $document->file_identifier_id = $hub->id;
                        $document->file_identifier = 'hubs';
                        $document->file = $file_name;
                        $document->save();
                    }
                }
            endif;
            DB::commit();

            $response = array(
                'success'  =>true,
                'title'     =>'Hib Profile',
                'message'  => 'Hib updated successfully'
            );


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


    public function destroyDoc($doc_id)
    {
        $doc = DocumentsModel::where('uuid',$doc_id)->first();
        unlink(storage_path('app/public/hub/'.$doc->file));
        $doc->delete();
        $response = array(
            'success'  =>true,
            'title'     =>'Document',
            'message'  => 'Delete successfully'
        );
        return json_encode($response);
    }
}
