<?php

namespace Modules\Permission\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Permission\Entities\PerMenu;
use Brian2694\Toastr\Facades\Toastr;

class PerMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $dbData = PerMenu::paginate(30);
        $menuName = PerMenu::all();
        return view('permission::menu.index',compact('dbData','menuName'));

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
            'menu_name' => 'required',
            'parentmenu_id' => '',
        ]);
        if (!empty($request->parentmenu_id)) {
           $menuDetail = PerMenu::findOrFail($request->parentmenu_id);
           $validated['lable'] = (int)$menuDetail->lable + 1;
        } else {
            $validated['lable'] = 1;
            $validated['parentmenu_id'] = 0;
        }

        PerMenu::create($validated);
        return redirect()->route('permissionmenu.index')->with('success',__('language.data_save'));

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
    public function update(Request $request, PerMenu $menupermission)
    {
        $validated = $request->validate([
            'menu_name' => 'required',
            'parentmenu_id' => '',
        ]);

        if (!empty($request->parentmenu_id)) {
           $menuDetail = PerMenu::findOrFail($request->parentmenu_id);
           $validated['lable'] = (int)$menuDetail->lable + 1;
        } else {
            $validated['lable'] = 1;
            $validated['parentmenu_id'] = 0;
        }

        $menupermission->update($validated);
        return redirect()->route('permissionmenu.index')->with('update',__('language.data_update'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(PerMenu $menupermission)
    {
        $menupermission->delete();
        Toastr::success('Menu Deleted successfully :)', 'Success');
        return response()->json(['success' => 'success']);
    }
}
