<?php

namespace Modules\EkoAdmin\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\ExportStartUp;
use App\Imports\StartUpImport;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Modules\EkoAdmin\Entities\Industry;
use Illuminate\Support\Facades\Validator;
use Modules\User\Entities\PasswordSetting;
use Modules\EkoAdmin\Entities\CountryModel;
use Modules\EkoAdmin\Entities\StartUpModel;
use Illuminate\Contracts\Support\Renderable;
use Modules\EkoAdmin\Entities\DocumentsModel;
use Modules\EkoAdmin\Entities\InvestmentStage;

class StartUpController extends Controller
{
    
    public function index(Request $request)
    {
        
        //return $request;
        $startups = StartUpModel::with('industryadd')->Filter($request)->latest('id')->paginate(10);

        return view('ekoadmin::startups.index')->with([
            'startups'  => $startups,
            'countries' => CountryModel::all(),
            'industries'=>Industry::all(),
            'investstage'=>InvestmentStage::all()
        ]);
    }


    public function create()
    {
        $countries = CountryModel::all();
        $industries = Industry::all();
        return view('ekoadmin::startups.create')->with([
            'countries' => $countries,
            'industries'=>$industries,
            'investstage'=>InvestmentStage::all()
        ]);
    }



    public function store(Request $request)
    {

        
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'about' => 'required',
            'address' => 'required',
            'country_id' => 'required',
            'no_of_employees' => 'required',
            'year_launched' => 'required',
            'industry' => 'required',
            'startup_logo' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => 'required'
        ],[
            'name' => 'Name is required',
            'description' => 'Description is required',
            'about' => 'About is required',
            'address' => 'Address is required',
            'country_id' => 'Country is required',
            'no_of_employees' => 'No. of Employee is required',
            'year_launched' => 'Launch Year is required',
            'industry' => 'Industry is required',
            'startup_logo' => 'Logo is required',
            'email' => 'Email Should be uniq and a valid email',
            'password' => 'Password Is Required'
        ]);

        

        try {
            DB::beginTransaction();

            $data = new StartUpModel();
            
            if($request->file('startup_logo')){
                $file = $request->file('startup_logo');
                $file_name = 'startup_logo'.time().'.'.$file->getClientOriginalExtension();
                $destinationPath = storage_path('app/public/startups');
                $file->move($destinationPath,$file_name);
                $request->merge(['logo' => $file_name]);
            }

            if($request->email){
                $passwordSetting = PasswordSetting::firstOrFail();
                $password = $request->password . $passwordSetting->salt;
                $startupUser['user_name']      = str_replace(' ', '-', $request->name);
                $startupUser['email']          = $request->email;
                $startupUser['password']       = Hash::make($password);
                $startupUser['user_type_id']   = 3;
                $startupUser['is_active']      = 1;
                $user = User::create($startupUser);
                $request->merge(['user_id' => $user->id]);
            }
            

            


            $startups = $data->create($request->all());
            
            if(isset($request->document_title)):

                for ($i = 0; $i < sizeof($request->document_title); $i++) {

                    if ($request->document_upload[$i] != null) {

                        $file = $request->document_upload[$i];
                        $file_name = 'startup_doc'.time().rand(10,100000).'.'.$file->getClientOriginalExtension();
                        $destinationPath = storage_path('app/public/startups');
                        $file->move($destinationPath,$file_name);

                        $document = new DocumentsModel();
                        $document->title = $request->document_title[$i];
                        $document->file_identifier_id = $startups->id;
                        $document->file_identifier = 'startup';
                        $document->file = $file_name;
                        $document->save();
                    }
                }
            endif;

            DB::commit();
            Toastr::success('Startups is added successfully', 'Success');
            return redirect()->route('admin.startups.index');

        } catch (\Exception $e) {

            DB::rollBack();
            Toastr::error('Startups added is failed', 'Failed');
            return redirect()->route('admin.startups.index');

        }

    }


    public function show($id)
    {
        return view('ekoadmin::show');
    }

 
    public function edit($uuid)
    {
        $industries = Industry::all();
        $countries = CountryModel::all();
        $startup = StartUpModel::firstWhere('uuid',$uuid);

        $startup_docs = DocumentsModel::where('file_identifier_id',$startup->id)->where('file_identifier','startup')->get();

        return view('ekoadmin::startups.edit')->with([
            'startup' => $startup,
            'countries'=>$countries,
            'startup_docs'=>$startup_docs,
            'industries'=>$industries,
            'investstage'=>InvestmentStage::all()
        ]);
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'about' => 'required',
            'address' => 'required',
            'country_id' => 'required',
            'no_of_employees' => 'required',
            'year_launched' => 'required',
            'industry' => 'required',
        ],[
            'name' => 'Name is required',
            'description' => 'Description is required',
            'about' => 'About is required',
            'address' => 'Address is required',
            'country_id' => 'Country is required',
            'no_of_employees' => 'No. of Employee is required',
            'year_launched' => 'Launch Year is required',
            'industry' => 'Industry is required',
        ]);

        try {
            DB::beginTransaction();
            $data = StartUpModel::firstWhere('uuid',$id);
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
            Toastr::success('Startups is added successfully', 'Success');
            return redirect()->route('admin.startups.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Startups added is failed', 'Failed');
            return $e->getMessage();
        }
    }


    public function destroy ($id) {
        $data = StartUpModel::where('uuid',$id)->first();
        if($data){
            StartUpModel::where('uuid',$id)->delete();
            DocumentsModel::where('file_identifier_id',$data->id)->where('file_identifier','startup')->delete();
            
        }
        Toastr::success('Deleted successfully', 'Success');
        return redirect()->route('admin.startups.index');
    }


    public function destroy_doc($startup_id,$doc_id)
    {
        $doc = DocumentsModel::where('uuid',$doc_id)->first();
        unlink(storage_path('app/public/startups/'.$doc->file));
        $doc->delete();
        Toastr::success('Deleted successfully', 'Success');
        return redirect()->route('admin.startups.edit',$startup_id);
    }

    public function import(Request $request){
        
        Excel::import(new StartUpImport, $request->file('file')->store('files'));

        Toastr::success('Hub import successfully ', 'Success');
        return redirect()->back();
    }

    public function export(Request $request) 
    {
        return Excel::download(new ExportStartUp, 'startups.xlsx');
    }


}
