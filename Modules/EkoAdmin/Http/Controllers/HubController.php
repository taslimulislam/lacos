<?php

namespace Modules\EkoAdmin\Http\Controllers;

use App\Models\User;
use App\Exports\ExportHub;
use App\Imports\HubImport;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\EkoAdmin\Entities\Hub;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Modules\EkoAdmin\Entities\Country;
use Modules\EkoAdmin\Entities\Industry;
use Modules\User\Entities\PasswordSetting;
use Illuminate\Contracts\Support\Renderable;
use Modules\EkoAdmin\Entities\DocumentsModel;

class HubController extends Controller
{

    public function index()
    {
        $hubs = Hub::with('country','industry')->latest('id')->paginate(10);
        return view('ekoadmin::hub.index',compact('hubs'));
    }

    
    public function create()
    {
        $country = Country::all();
        $industry = Industry::all();
        return view('ekoadmin::hub.create',compact('country','industry' ));
    }


    public function store(Request $request) {

        $request->validate([
            "name"          => 'required',
            "country_id"    => 'required',
            "industry_id"   => 'required',
            "num_of_investment" => 'required',
            "address"       => 'required',
            "web_link"      => 'required',
            "year_launched" => 'required',
            "logo"          => 'image|mimes:jpeg,png,jpg',
            "about"         => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => 'required'

        ]);

        try {


            DB::beginTransaction();
            $input = $request->all();

            if ($request->hasFile('logo')) {
                $request_file = $request->file('logo');
                $filename     = time() . rand(10, 1000) . '.' . $request_file->extension();
                $path         = $request_file->storeAs('hub', $filename, 'public');
                $input['logo'] = "$path";
            }else{
                unset($input['logo']);
            }

            if($request->email){
                $passwordSetting = PasswordSetting::firstOrFail();
                $password = $request->password . $passwordSetting->salt;
                $startupUser['user_name']      = str_replace(' ', '-', $request->name);
                $startupUser['email']          = $request->email;
                $startupUser['password']       = Hash::make($password);
                $startupUser['user_type_id']   = 5;
                $startupUser['is_active']      = 1;
                $user = User::create($startupUser);
                $input['user_id'] = $user->id;
            }


            $hub = new Hub();
            $hub->fill($input);
            $hub->save();

          



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
            DB::commit();
            Toastr::success('Hub added successfully ', 'Success');
            return redirect()->route('admin.hubs.index');
        } catch (\Exception $e) {
            DB::rollBack();
            
            Toastr::error('Somthing went wrong ', 'Error');
            return redirect()->route('admin.hubs.index');
        }


    }

    public function edit(Hub $hub)
    {

        $country = Country::all();
        $industry = Industry::all();
        $hub_doc = DocumentsModel::where('file_identifier_id',$hub->id)->where('file_identifier','hubs')->get();

        return view('ekoadmin::hub.update',compact(
            'country','industry','hub','hub_doc'
        ));
    }

    public function update(Request $request, Hub $hub){

        $request->validate([
            "name"          => 'required',
            "country_id"    => 'required',
            "industry_id"   => 'required',
            "num_of_investment" => 'required',
            "address"       => 'required',
            "web_link"      => 'required',
            "year_launched" => 'required',
            "logo"          => 'image|mimes:jpeg,png,jpg',
            "about"         => 'required',

        ]);

        try {
            DB::beginTransaction();
            $input = $request->all();
            if ($request->hasFile('logo')) {
                
                if (!empty($hub['logo'])) {
                    $imagePath = 'public/storage/'.$hub['logo'];
                    
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
            Toastr::success('Hub updated successfully ', 'Success');
            return redirect()->route('admin.hubs.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Somthing went wrong ', 'Error');
            // return redirect()->route('admin.hubs.index');
            return $e->getMessage();
        }
        
    }

    public function destroy(Hub $hub)
    {
        if (!empty($hub['logo'])) {
            $imagePath = 'public/storage/'.$hub['logo'];
            if(isset($imagePath) && file_exists($imagePath)) {
                
                unlink($imagePath); //delete from storage
            }
        }
        if (Hub::where('uuid' , $hub->uuid)->delete()) {
            
            $docs = DocumentsModel::where('file_identifier_id',$hub->id)->where('file_identifier','hubs')->get();
            foreach($docs as $doc){
                unlink(storage_path('app/public/hub/'.$doc->file));
                $doc->delete();
            }
            Toastr::success('Hub deleted successfully ', 'Success');
            return redirect()->route('admin.hubs.index');
        }else {
            Toastr::error('Somthing went wrong ', 'Error');
            return redirect()->route('admin.hubs.index');
        }
        
    }

    public function destroy_doc($hub_id,$doc_id)
    {
        $doc = DocumentsModel::where('uuid',$doc_id)->first();
        unlink(storage_path('app/public/hub/'.$doc->file));
        $doc->delete();
        Toastr::success('Deleted successfully', 'Success');
        return redirect()->route('admin.hubs.edit',$hub_id);
    }

    public function import(Request $request){
        
        Excel::import(new HubImport, $request->file('file')->store('files'));

        Toastr::success('Investor import successfully ', 'Success');
        return redirect()->back();
    }

    public function export(Request $request) 
    {
        
        return Excel::download(new ExportHub, 'hubs.xlsx');
    }
}
