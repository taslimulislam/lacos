<?php

namespace Modules\Teams\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Teams\Entities\TeamMember;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class TeamsController extends Controller
{
    
    public function index()
    {
        return view('teams::__team_list');
    }

 
    public function create()
    {
        return view('teams::create');
    }


    public function store(Request $request)
    {

        $validate = Validator::make($request->all(),
        [
            'name' => 'required|string|between:2,100',
            'position' => 'required',
            'team_image' => 'required',
            'about' => 'required',
        ],
        ['required' => ':attribute is required']);


        if($validate->fails()){
            return   json_encode([  
                'success'  => false,
                'title'     =>'Report',
                'message'  => $validate->errors()->first() 
            ]);
        }

        if ($request->file('team_image')) {
            $request_file = $request->file('team_image');
            $filename     = time() . rand(10, 1000) . '.' . $request_file->extension();
            $path         = $request_file->storeAs('team_image', $filename, 'public');
            $team_image    = $path;
        }


        $teamData = array(
            'user_id'   => auth()->user()->id,
            'name'      => $request->name,
            'position'  => $request->position,
            'about'     => $request->about,
            'image'     => $team_image,
        );

        TeamMember::create($teamData);

        $response = array(
            'success'  =>true,
            'title'     =>'Team Member',
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
        $data =  TeamMember::firstWhere('id',$id);
        return json_encode($data);

    }


    public function update(Request $request, $id)
    {


        $validate = Validator::make($request->all(),
        [
            'name' => 'required|string|between:2,100',
            'position' => 'required',
            'team_image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'about' => 'required',
        ],
        ['required' => ':attribute is required']);


        if($validate->fails()){
            return   json_encode([  
                'success'  => false,
                'title'     =>'Report',
                'message'  => $validate->errors()->first() 
            ]);
        }


        $teamData = array(
            'name'=>$request->name,
            'position'=>$request->position,
            'about'=> $request->about
        );

       
        if ($request->file('team_image')) {
            
            $request_file = $request->file('team_image');
            $filename     = time() . rand(10, 1000) . '.' . $request_file->extension();
            $path         = $request_file->storeAs('team_image', $filename, 'public');
            $teamData['image']    = $path;

        }


        if(TeamMember::where('id',$id)->update($teamData)){

            $response = array(
                'success'  =>true,
                'title'     =>'Team Member',
                'message'  => 'update successfully'
            );
        }else{
            $response = array(
                'success'   => true,
                'title'     =>'Team Member',
                'message'   => 'Oops! Something went wrong, Please try again'
            );
        }

        return json_encode($response);


    }


    public function destroy($id)
    {

        try {
            $data = TeamMember::firstWhere('id',$id);
            if($data->delete()){
                $response = array(
                    'success'   => true,
                    'title'     => 'Team Member',
                    'message'   => 'Delete Successfully'
                );
            }
            return json_encode($response);
            
        } catch (\Exception $e){
            $response = array(
                'success'   => false,
                'title'     => 'Team Member',
                'message'   => 'Deleted failed'
            );
            return json_encode($response);
        }

      
    }


    

    public function getTeams(Request $request)
    {

        if ($request->ajax()) {
            $data=TeamMember::with('teamUser')->get();
            
            return DataTables::of($data)->addIndexColumn()

                ->addColumn('image', function ($data) {
                    return '<img src="'.getImage($data->image).'" width="50">';
                })

                ->addColumn('type', function ($data) {

                    if($data->teamUser->user_type_id==3){
                        return 'Startup';
                    }
                    if($data->teamUser->user_type_id==4){
                        return 'Investor';
                    }
                    if($data->teamUser->user_type_id==5){
                        return 'Hub';
                    }
                    
                })

                ->addColumn('name', function ($data) {
                    return $data->name;
                })

                ->addColumn('about', function ($data) {
                    return Str::limit($data->about,80);
                })

                ->addColumn('position', function ($data) {
                    return $data->position;
                })

                ->addColumn('action', function($data){
                    $actionBtn = '<a href="javascript:void(0)" id="editAction" data-update-route="'.route('teams.update',$data->id).'" data-edit-route="'.route('teams.edit',$data->id).'" class="btn btn-success btn-sm"><i class="far fa-edit"></i></a> '; 
                    $actionBtn .= '<a href="javascript:void(0)" id="deleteAction" data-delete-route="'.route('delete-team',$data->id).'" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>';
                    return $actionBtn;
                })

            ->rawColumns([ 'image', 'name','about','position','action'])
            ->make(true);
        }

    }
}
