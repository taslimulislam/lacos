<?php

namespace Modules\EkoAdmin\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\EkoAdmin\Entities\ResearchModel;

class ResearchController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $articles = ResearchModel::where('publish_status','!=',2)->paginate(10);
        return view('ekoadmin::research.index')->with(['articles'=>$articles]);
    }

    public function approve ($id) {
        try {
            $event = ResearchModel::firstWhere('uuid',$id);
            if($event){
                $event->publish_status = '1';
                $event->save();
                Toastr::success('Approved successfully', 'Success');
                return redirect()->route('admin.research.index');
            }
        } catch (\Exception $e) {
            Toastr::error('something went wrong', 'Failed');
            return redirect()->route('admin.research.index');
        }

    }

    public function decline ($id) {
        try {
            $event = ResearchModel::firstWhere('uuid',$id);
            if($event){
                $event->publish_status = '2';
                $event->save();
                Toastr::success('Decline successfully', 'Success');
                return redirect()->route('admin.research.index');
            }
        } catch (\Exception $e) {
            Toastr::error('something went wrong', 'Failed');
            return redirect()->route('admin.research.index');
        }

    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('ekoadmin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
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
        return view('ekoadmin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
