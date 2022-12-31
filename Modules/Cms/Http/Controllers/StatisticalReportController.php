<?php

namespace Modules\Cms\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Modules\Cms\Entities\StatisticalReport;
use Illuminate\Contracts\Support\Renderable;

class StatisticalReportController extends Controller
{


    public function index()
    {
        return view('cms::staticalreport.__statical_report',[
            'reports' => StatisticalReport::paginate(15)
        ]);
    }


    public function create()
    {
        return view('cms::create');
    }


    public function store(Request $request)
    {

        $validate = Validator::make($request->all(),
        [
            'name' => 'required|string|between:2,100',
            'price' => 'required',
            'report_image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'report_doc' => 'required',
            'about_report' => 'required',
        ],
        ['required' => ':attribute is required']);


        if($validate->fails()){

            return   json_encode([  
                'success'   => false,
                'title'     =>'Report',
                'message'   => $validate->errors()->first() 
            ]);
        }


        $reportdata = array(
            'name'          =>  $request->name,
            'price'         =>  $request->price,
            'about_report'  =>  $request->about_report
        );

       
        if ($request->file('report_image')) {
            
            $request_file = $request->file('report_image');
            $filename     = time() . rand(10, 1000) . '.' . $request_file->extension();
            $path         = $request_file->storeAs('report_image', $filename, 'public');
            $reportdata['report_image']    = $path;

        }else{
            $reportdata['report_image']    = '';
        }


        if ($request->file('report_doc')) {

            $request_file = $request->file('report_doc');
            $filename     = time() . rand(10, 1000) . '.' . $request_file->extension();
            $path         = $request_file->storeAs('report_doc', $filename, 'public');
            $reportdata['report_doc']    = $path;

        }else{
            $reportdata['report_doc']    = '';
        }



        if(StatisticalReport::create($reportdata)){

            $response = array(
                'success'  =>true,
                'title'     =>'Report',
                'message'  => 'Added successfully'
            );
        }else{
            $response = array(
                'success'   => true,
                'title'     =>'Report',
                'message'   => 'Oops! Something went wrong, Please try again'
            );
        }

        return json_encode($response);
       
    }


    public function show($id)
    {
        return view('cms::show');
    }


    public function edit($id)
    {

        $data =  StatisticalReport::firstWhere('id',$id);
        return json_encode($data);

    }


    public function update(Request $request, $id)
    {


        $validate = Validator::make($request->all(),
        [
            'name' => 'required|string|between:2,100',
            'price' => 'required',
            'report_image' => 'required',
            'report_doc' => 'required',
            'about_report' => 'required',
        ],
        ['required' => ':attribute is required']);


        if($validate->fails()){
            return   json_encode([  
                'success'  => false,
                'title'     =>'Report',
                'message'  => $validate->errors()->first() 
            ]);
        }


        $reportdata = array(
            'name'=>$request->name,
            'price'=>$request->price,
            'about_report'=> $request->about_report
        );

       
        if ($request->file('report_image')) {
            
            $request_file = $request->file('report_image');
            $filename     = time() . rand(10, 1000) . '.' . $request_file->extension();
            $path         = $request_file->storeAs('report_image', $filename, 'public');
            $reportdata['report_image']    = $path;

        }


        if ($request->file('report_doc')) {

            $request_file = $request->file('report_doc');
            $filename     = time() . rand(10, 1000) . '.' . $request_file->extension();
            $path         = $request_file->storeAs('report_doc', $filename, 'public');
            $reportdata['report_doc']    = $path;

        }


        if(StatisticalReport::where('id',$id)->update($reportdata)){

            $response = array(
                'success'  =>true,
                'title'     =>'Report',
                'message'  => 'update successfully'
            );
        }else{
            $response = array(
                'success'   => true,
                'title'     =>'Report',
                'message'   => 'Oops! Something went wrong, Please try again'
            );
        }

        return json_encode($response);


    }


    public function destroy($id)
    {

        try {
            StatisticalReport::where('id',$id)->delete();
            $response = array(
                'success'   => true,
                'title'     => 'Report',
                'message'   => 'Delete Successfully'
            );
            return json_encode($response);
            
        } catch (\Exception $e){
            $response = array(
                'success'   => false,
                'title'     => 'Report',
                'message'   => 'Deleted failed'
            );
            return json_encode($response);
        }

      
    }



    public function getReports(Request $request)
    {

        if ($request->ajax()) {

            
            return DataTables::of($data=StatisticalReport::get())->addIndexColumn()

                ->addColumn('report_image', function ($data) {
                    return '<img src="'.getImage($data->report_image).'" width="50">';
                })
                
                ->addColumn('name', function ($data) {
                    return $data->name;
                })

                ->addColumn('about_report', function ($data) {
                    return Str::limit($data->about_report,80);
                })

                ->addColumn('price', function ($data) {
                    return $data->price;
                })

                ->addColumn('action', function($data){
                    $actionBtn = '<a href="javascript:void(0)" id="editAction" data-update-route="'.route('statistical-report.update',$data->id).'" data-edit-route="'.route('statistical-report.edit',$data->id).'" class="btn btn-success btn-sm"><i class="far fa-edit"></i></a> '; 
                    $actionBtn .= '<a href="javascript:void(0)" id="deleteAction" data-delete-route="'.route('delete-report',$data->id).'" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>';
                    return $actionBtn;
                })

            ->rawColumns([ 'report_image', 'name','about_report','price','action'])
            ->make(true);
        }

    }



}


