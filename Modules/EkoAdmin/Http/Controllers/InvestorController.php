<?php

namespace Modules\EkoAdmin\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\ExportInvestor;
use App\Imports\InvestorImport;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Modules\EkoAdmin\Entities\Country;
use Modules\EkoAdmin\Entities\Industry;
use Modules\EkoAdmin\Entities\Investor;
use Modules\User\Entities\PasswordSetting;
use Modules\EkoAdmin\Entities\CountryModel;
use Modules\EkoAdmin\Entities\InvestorType;
use Illuminate\Contracts\Support\Renderable;
use Modules\EkoAdmin\Entities\DocumentsModel;
use Modules\EkoAdmin\Entities\InvestmentExit;
use Modules\EkoAdmin\Entities\InvestmentStage;

class InvestorController extends Controller
{

    public function index(Request $request)
    {
        $investor = Investor::with('country','industry','investorType','investmentExit','investmentStage')->Filter($request)->latest('id')->paginate(10);
        
        return view('ekoadmin::investor.index',[
            'investor'      => $investor,
            'countries'     => CountryModel::all(),
            'industries'    => Industry::all(),
            'investstage'   => InvestmentStage::all()
        ]);

    }


    public function create()
    {
        $country = Country::all();
        $investexit = InvestmentExit::all();
        $industry = Industry::all();
        $investstage = InvestmentStage::all();
        $investortype = InvestorType::all();

        return view('ekoadmin::investor.create',compact(
            'country','investexit','industry','investstage','investortype'
        ));
    }


    public function store(Request $request) {

        $request->validate([
            "company_name"  => 'required',
            "country_id"   => 'required',
            "exits_id"      => 'required',
            "industry_id"      => 'required',
            "investment_stage_id" => 'required',
            "investor_types_id" => 'required',
            "web_link"      => 'required',
            "year_founded"  => 'required',
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
                $path         = $request_file->storeAs('investor', $filename, 'public');
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
                $startupUser['user_type_id']   = 4;
                $startupUser['is_active']      = 1;
                $user = User::create($startupUser);
                $input['user_id'] = $user->id;
            }

          


            $investor = new Investor();
            $investor->fill($input);
            $investor->save();

            




            if($request->document_upload!=''){

                for ($i = 0; $i < sizeof($request->document_title); $i++) {

                    if ($request->document_upload[$i] != null) {
                        $file = $request->document_upload[$i];
                        $file_name = 'investor_doc'.time().rand(10,100000).'.'.$file->getClientOriginalExtension();
                        $destinationPath = storage_path('app/public/investor');
                        $file->move($destinationPath,$file_name);

                        $document = new DocumentsModel();
                        $document->title = $request->document_title[$i];
                        $document->file_identifier_id = $investor->id;
                        $document->file_identifier = 'investor';
                        $document->file = $file_name;
                        $document->save();
                    }
                }
            }

            DB::commit();
            Toastr::success('Investor added successfully ', 'Success');
            return redirect()->route('admin.investor.index');
        } catch (\Exception $e) {
            DB::rollBack();
            
            Toastr::error('Somthing went wrong ', 'Error');
            return redirect()->route('admin.investor.index');
        }

    }

    public function edit(Investor $investor)
    {

        $country      = Country::all();
        $investexit   = InvestmentExit::all();
        $industry     = Industry::all();
        $investstage  = InvestmentStage::all();
        $investortype = InvestorType::all();
        $investor_doc = DocumentsModel::where('file_identifier_id',$investor->id)->where('file_identifier','investor')->get();

        return view('ekoadmin::investor.update',compact(
            'country','investexit','industry','investstage','investortype','investor','investor_doc'
        ));
        
    }

    public function update(Request $request, Investor $investor){

        $request->validate([
            "company_name"  => 'required',
            "country_id"   => 'required',
            "exits_id"      => 'required',
            "industry_id"      => 'required',
            "investment_stage_id" => 'required',
            "investor_types_id" => 'required',
            "web_link"      => 'required',
            "year_founded"  => 'required',
            "logo"          => 'image|mimes:jpeg,png,jpg',
            "about"         => 'required',

        ]);
        try {
            DB::beginTransaction();

            $input = $request->all();

            if ($request->hasFile('logo')) {
                
                if (!empty($investor['logo'])) {
                    $imagePath = 'public/storage/'.$investor['logo'];
                    if(file_exists($imagePath)) {
                        unlink($imagePath); //delete from storage
                    }
                }
                
                $request_file = $request->file('logo');
                $filename     = time() . rand(10, 1000) . '.' . $request_file->extension();
                $path         = $request_file->storeAs('investor', $filename, 'public');
                $input['logo'] = "$path";
            }else{
                
                unset($input['logo']);
            }


            // return $input;
            $investor->update($input);

            
            if(isset($request->document_title)):
                for ($i = 0; $i < sizeof($request->document_title); $i++) {
                    if ($request->document_upload[$i] != null) {
                        $file = $request->document_upload[$i];
                        $file_name = 'investor_doc'.time().rand(10,100000).'.'.$file->getClientOriginalExtension();
                        $destinationPath = storage_path('app/public/investor');
                        $file->move($destinationPath,$file_name);

                        $document = new DocumentsModel();
                        $document->title = $request->document_title[$i];
                        $document->file_identifier_id = $investor->id;
                        $document->file_identifier = 'investor';
                        $document->file = $file_name;
                        $document->save();
                    }
                }
            endif;

            DB::commit();
            Toastr::success('Investor updated successfully ', 'Success');
            return redirect()->route('admin.investor.index');

        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Somthing went wrong ', 'Error');
            // return redirect()->route('admin.investor.index');
            return $e->getMessage();
        }

        
    }

    public function destroy(Investor $investor)
    {

        if (!empty($investor['logo'])) {
            $imagePath = 'public/storage/'.$investor['logo'];
            if(isset($imagePath) && file_exists($imagePath)) {
                unlink($imagePath); //delete from storage
            }
        }
        if (Investor::where('uuid' , $investor->uuid)->delete()) {
            
            $docs = DocumentsModel::where('file_identifier_id',$investor->id)->where('file_identifier','investor')->get();
            foreach($docs as $doc){
                unlink(storage_path('app/public/investor/'.$doc->file));
                $doc->delete();
            }
            
            Toastr::success('Investor deleted successfully ', 'Success');
            return redirect()->route('admin.investor.index');
        }else {
            Toastr::error('Somthing went wrong ', 'Error');
            return redirect()->route('admin.investor.index');
        }


    }

    public function destroy_doc($investor_id,$doc_id)
    {
        $doc = DocumentsModel::where('uuid',$doc_id)->first();
        unlink(storage_path('app/public/investor/'.$doc->file));
        $doc->delete();
        Toastr::success('Deleted successfully', 'Success');
        return redirect()->route('admin.investor.edit',$investor_id);
    }


    public function import(Request $request){

        Excel::import(new InvestorImport, $request->file('file')->store('files'));

        Toastr::success('Investor import successfully ', 'Success');
        return redirect()->back();
    }

    public function export(Request $request)
    {

        return Excel::download(new ExportInvestor, 'investors.xlsx');
    }

}
