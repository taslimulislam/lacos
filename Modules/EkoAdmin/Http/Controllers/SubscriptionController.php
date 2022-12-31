<?php

namespace Modules\EkoAdmin\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\EkoAdmin\Entities\SubscriptionModel;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $plans = SubscriptionModel::paginate(10);
        
        return view('ekoadmin::plans.index')->with(['plans'=>$plans]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('ekoadmin::plans.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'startup_views' => 'required',
            'report_views' => 'required',
            'description' => 'required',
            'duration' => 'required',
//            'feature' => 'required'
        ],[
            'name' => 'Name is required',
            'price' => 'Price is required',
            'startup_views' => 'Startup view is required',
            'report_views' => 'Report view is required',
            'description' => 'Description is required',
            'duration' => 'Duration is required',
//            'feature' => 'Feature is required'
        ]);
        try {
//            $data = explode(',',$request->feature);
            $plan = new SubscriptionModel();
            $plan->name =   $request->name;
            $plan->price =  $request->price;
            $plan->startup_views =  $request->startup_views;
            $plan->report_views =   $request->report_views;
            $plan->description =    $request->description;
            $plan->duration =   $request->duration;
            $plan->features =   $request->feature;
            $plan->save();
            Toastr::success('Subscription Plan is added successfully', 'Success');
            return redirect()->route('admin.plans.index');
        } catch (\Exception $e) {
            Toastr::error('Subscription Plan added is failed', 'Failed');
            return redirect()->route('admin.plans.index');
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
    public function edit($uuid)
    {
        $plan = SubscriptionModel::firstWhere('uuid',$uuid);
        return view('ekoadmin::plans.edit')->with(['plan'=>$plan]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $uuid)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'startup_views' => 'required',
            'report_views' => 'required',
            'description' => 'required',
            'duration' => 'required',
        ],[
            'name' => 'Name is required',
            'price' => 'Price is required',
            'startup_views' => 'Startup view is required',
            'report_views' => 'Report view is required',
            'description' => 'Description is required',
            'duration' => 'Duration is required',
        ]);
        try {
            $plan = SubscriptionModel::firstWhere('uuid',$uuid);
//            $data = explode(',',$request->feature);
            $plan = SubscriptionModel::find($plan->id);
            $plan->name =   $request->name;
            $plan->price =  $request->price;
            $plan->startup_views =  $request->startup_views;
            $plan->report_views =   $request->report_views;
            $plan->description =    $request->description;
            $plan->duration =   $request->duration;
            $plan->features =   $request->feature;
            $plan->save();
            Toastr::success('Subscription Plan is updated successfully', 'Success');
            return redirect()->route('admin.plans.index');
        } catch (\Exception $e) {
            Toastr::error('Subscription Plan added is failed', 'Failed');
            return redirect()->route('admin.plans.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($uuid)
    {
        try {
            SubscriptionModel::where('uuid',$uuid)->delete();
            Toastr::success('Subscription Plan is deleted successfully', 'Success');
            return redirect()->route('admin.plans.index');
        } catch (\Exception $exception) {
            Toastr::error('Something went wrong', 'Failed');
            return redirect()->route('admin.plans.index');
        }
    }
    
}
