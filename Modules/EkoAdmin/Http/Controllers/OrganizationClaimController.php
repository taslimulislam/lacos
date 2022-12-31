<?php

namespace Modules\EkoAdmin\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\EkoAdmin\Entities\ClaimModel;

class OrganizationClaimController extends Controller
{
    

    public function index()
    {
        $claims = ClaimModel::paginate(10);
        return view('ekoadmin::claim.index')->with(['claims'=>$claims]);
    }

    public function approve ($id) {
        
        try {
            $claim = ClaimModel::firstWhere('uuid',$id);
            if($claim){
                $claim->status = '1';
                $claim->save();
                Toastr::success('Approved successfully', 'Success');
                return redirect()->route('admin.claim.index');
            }
        } catch (\Exception $e) {
            Toastr::error('something went wrong', 'Failed');
            return redirect()->route('admin.claim.index');
        }

    }

    public function decline ($id) {
        try {
            $claim = ClaimModel::firstWhere('uuid',$id);
            if($claim){
                $claim->status = '2';
                $claim->save();
                Toastr::success('Decline successfully', 'Success');
                return redirect()->route('admin.claim.index');
            }
        } catch (\Exception $e) {
            Toastr::error('something went wrong', 'Failed');
            return redirect()->route('admin.claim.index');
        }

    }

  
    public function create()
    {
        return view('ekoadmin::create');
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        return view('ekoadmin::show');
    }


    public function edit($id)
    {
        return view('ekoadmin::edit');
    }

 
    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
