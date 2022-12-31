<?php

namespace Modules\EkoAdmin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\EkoAdmin\Entities\Deal;
use Modules\EkoAdmin\Entities\Investor;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Modules\EkoAdmin\Entities\StartUpModel;
use Illuminate\Contracts\Support\Renderable;

class DealsController extends Controller
{
    
    public function index()
    {
        return view('ekoadmin::deals.__deal_list',[
            'investors' => Investor::latest()->cursor(),
            'startups'  => StartUpModel::latest()->cursor(),
        ]);
    }

 
    public function create()
    {
        return view('admin.deals::create');
    }


    public function store(Request $request)
    {

        $validate = Validator::make($request->all(),
        [
            'deal_name' => 'required|string|between:2,100',
            'deal_amount' => 'required',
            'startup_user_id' => 'required',
            'investor_user_id' => 'required',
        ],
        ['required' => ':attribute is required']);


        if($validate->fails()){
            return   json_encode([  
                'success'  => false,
                'title'     =>'Report',
                'message'  => $validate->errors()->first() 
            ]);
        }

        $input = $request->all();
        $input = $request->except(['_token','_method','id']);


        $deals = new Deal();
        $deals->fill($input);
        $deals->save();

        $response = array(
            'success'  =>true,
            'title'     =>'Deal',
            'message'  => 'Added successfully'
        );
        
        return json_encode($response);
       
    }


    public function show($id)
    {
        return view('cms::show');
    }


    public function edit($id)
    {
        $data =  Deal::firstWhere('id',$id);
        return json_encode($data);

    }


    public function update(Request $request, $id)
    {


        $validate = Validator::make($request->all(),
        [
            'deal_name' => 'required|string|between:2,100',
            'deal_amount' => 'required',
            'startup_user_id' => 'required',
            'investor_user_id' => 'required',
        ],
        ['required' => ':attribute is required']);


        if($validate->fails()){
            return   json_encode([  
                'success'  => false,
                'title'     =>'Report',
                'message'  => $validate->errors()->first() 
            ]);
        }
        $input = $request->all();
        $input = $request->except(['_token','_method','id']);
        $deals =  Deal::firstWhere('id',$id);
        $deals->fill($input);
        $deals->update();
        
        $response = array(
            'success'  =>true,
            'title'     =>'Deal',
            'message'  => 'update successfully'
        );
        

        return json_encode($response);


    }


    public function destroy($id)
    {

        try {
            $data = Deal::firstWhere('id',$id);
            if($data->delete()){
                $response = array(
                    'success'   => true,
                    'title'     => 'Deals',
                    'message'   => 'Delete Successfully'
                );
            }
            return json_encode($response);
            
        } catch (\Exception $e){
            $response = array(
                'success'   => false,
                'title'     => 'Deals',
                'message'   => 'Deleted failed'
            );
            return json_encode($response);
        }

      
    }


    

    public function getDealList(Request $request)
    {


        if ($request->ajax()) {

            $data = Deal::with('investor','startup')->orderBy('id')->get();
            
            return DataTables::of($data)->addIndexColumn()
                
                ->addColumn('id', function ($data) {
                    return $data->id;
                })

                ->addColumn('deal_name', function ($data) {
                    return $data->deal_name;
                })

                ->addColumn('deal_amount', function ($data) {
                    return $data->deal_amount;
                })
               
                ->addColumn('startup', function ($data) {
                    return $data->startup?->name;
                })

                ->addColumn('investor', function ($data) {
                    return $data->investor?->company_name;
                })

                ->addColumn('created_at', function ($data) {
                    return $data->created_at;
                })

                ->addColumn('action', function($data){
                    $actionBtn = '<a href="javascript:void(0)" id="editAction" data-update-route="'.route('admin.deals.update',$data->id).'" data-edit-route="'.route('admin.deals.edit',$data->id).'" class="btn btn-success btn-sm"><i class="far fa-edit"></i></a> '; 
                    $actionBtn .= '<a href="javascript:void(0)" id="deleteAction" data-delete-route="'.route('admin.deals.destroy',$data->id).'" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>';
                    return $actionBtn;
                })

            ->rawColumns([ 'deal_name', 'deal_amount','startup','investor','created_at','action'])
            ->make(true);
        }

    }
}
