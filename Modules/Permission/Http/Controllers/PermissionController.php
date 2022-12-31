<?php

namespace Modules\Permission\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Permission;
use Modules\Permission\Entities\PerMenu;
use Brian2694\Toastr\Facades\Toastr;
use Modules\Permission\Entities\Permission as OurPermission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $dbData = OurPermission::paginate(30);
        // $dbData = OurPermission::all();

        $perMenu = PerMenu::all();
        // dd($dbData);
        return view('permission::permission.index',compact('dbData','perMenu'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('permission::create');
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
            'per_menu_id' => 'required',
        ]);
        Permission::create($validated);
        return redirect()->route('permissions.index')->with('success',__('language.data_save'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('permission::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('permission::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Permission $getpermission)
    {
        $validated = $request->validate([
            'name' => 'required',
            'per_menu_id' => 'required',
        ]);
        $getpermission->update($validated);
        return redirect()->route('permissions.index')->with('update',__('language.data_update'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Permission $getpermission)
    {
        $getpermission->delete();
        Toastr::success('Permission Deleted successfully :)', 'Success');
        return response()->json(['success' => 'success']);
    }
}
