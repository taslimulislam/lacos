<?php

namespace Modules\Permission\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Modules\Permission\Entities\PerMenu;
use Illuminate\Support\Facades\DB;

class AssignPermissionToRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Role $role)
    {
        $roles = $role;
        $permissions = Permission::all();
        $perMenu = PerMenu::all();
        $roleHasPermission = $role->permissions->pluck('name');
        return view('permission::assignpermissiontorole.index',compact('roles','permissions','perMenu','roleHasPermission'));
    }
    public function assignroletouser()
    {
        $roles = Role::all();
        $users = User::all();
        return view('permission::assignpermissiontorole.assignroletouser',compact('roles','users'));
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
        $role = Role::findOrFail($request->role_id);

        $role->syncPermissions($request->permission);
        // $role->givePermissionTo($request->permission);
        return redirect()->route('assignrolepermissions.assingRole')->with('success',__('language.data_save'));
    }
    public function storeroleuser(Request $request)
    {
        $user = User::findOrFail($request->user_id);

        DB::transaction(function () use($user,$request) {
            $roles = $user->getRoleNames();
            if($roles->isNotEmpty())
            {
                foreach ($roles as $key => $roleName) {
                    $user->removeRole($roleName);
                }
            }
            $user->assignRole($request->role_name);
        });
        return redirect()->route('assignrolepermissions.assignRoleUserList')->with('success',__('language.data_save'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function assingRole()
    {
        $dbData = Role::paginate(30);
        return view('permission::assignpermissiontorole.assingrole',compact('dbData'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function assignRoleUserList()
    {
        $dbData = User::with('roles')->paginate(30);
        $roles = Role::all();
        return view('permission::assignpermissiontorole.assinguserrolelist',compact('dbData','roles'));
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
