<?php

namespace Modules\EkoAdmin\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Validator;
use Modules\EkoAdmin\Entities\AcademiaModel;
use Modules\EkoAdmin\Entities\CountryModel;
use Modules\EkoAdmin\Entities\DocumentsModel;
use Modules\EkoAdmin\Entities\Industry;
use Modules\EkoAdmin\Entities\StartUpModel;

class AcademiaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $academias = AcademiaModel::all();
        return view('ekoadmin::academia.index')->with(['academias'=>$academias]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $countries = CountryModel::all();
        $industries = Industry::all();
        return view('ekoadmin::academia.create')->with(['countries'=>$countries,'industries' => $industries]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'country_id' => 'required',
            'industry_id' => 'required'
        ],[
            'name' => 'Name is required',
            'country_id' => ' Country is required',
            'industry_id' => 'Industry is required'
        ]);

        $academia = new AcademiaModel();
        if($request->file('academiaup_logo')){
            $file = $request->file('academiaup_logo');
            $file_name = 'academiaup_logo'.time().'.'.$file->getClientOriginalExtension();
            $destinationPath = storage_path('app/public/academia');
            $file->move($destinationPath,$file_name);
            $request->merge(['logo' => $file_name]);
        }
        if($academia->create($request->all())) {
            Toastr::success('Academia is added successfully', 'Success');
            return redirect()->route('admin.academia.index');
        } else {
            Toastr::error('Academia added is failed', 'Failed');
            return redirect()->route('admin.academia.index');
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('ekoadmin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $countries = CountryModel::all();
        $industries = Industry::all();
        $academia = AcademiaModel::firstWhere('uuid',$id);
        return view('ekoadmin::academia.edit')->with(['academia' => $academia,'countries'=>$countries,'industries' => $industries]);;
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'country_id' => 'required',
            'industry_id' => 'required'
        ],[
            'name' => 'Name is required',
            'country_id' => ' Country is required',
            'industry_id' => 'Industry is required'
        ]);

        $academia = AcademiaModel::firstWhere('uuid',$id);
        if($request->file('academiaup_logo')){
            $file = $request->file('academiaup_logo');
            $file_name = 'academiaup_logo'.time().'.'.$file->getClientOriginalExtension();
            $destinationPath = storage_path('app/public/academia');
            $file->move($destinationPath,$file_name);
            $request->merge(['logo' => $file_name]);
            unlink(storage_path('app/public/academia/'.$academia->logo));
        }
        $is_success = AcademiaModel::updateOrCreate(
            ['id' =>  @$academia->id], $request->all()
        );
        if($is_success) {
            Toastr::success('Academia is updated successfully', 'Success');
            return redirect()->route('admin.academia.index');
        } else {
            Toastr::error('Academia update is failed', 'Failed');
            return redirect()->route('admin.academia.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        try {
            $data = AcademiaModel::firstWhere('uuid',$id);
            unlink(storage_path('app/public/academia/'.$data->logo));
            AcademiaModel::where('id',$data->id)->delete();
            Toastr::success('Academia is deleted successfully', 'Success');
            return redirect()->route('admin.academia.index');
        } catch (\Exception $e){
            Toastr::error('Deleted failed', 'Failed');
            return redirect()->route('admin.academia.index');
        }

    }
}
