<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    //index
    public function index()
    {
        //get all permissions
        $permissions = Permission::all();
        $roles = Role::all();
        
        //return the permissions with a view
        return view('users.permissions', compact('permissions', 'roles'));
    }

    //store permission with post request api
    public function store(Request $request)
    {
        //validate the request
        $request->validate([
            'name' => 'required',
        ]);

        //create the permission
        Permission::create($request->all());

        //redirect to the permissions index
        return redirect()->route('permissions.index');
    }

    //update permission with put request api
    public function update(Request $request, Permission $permission)
    {
        //validate the request
        $request->validate([
            'name' => 'required',
        ]);

        //update the permission
        $permission->update($request->all());

        //redirect to the permissions index
        return redirect()->route('permissions.index');
    }

    //destroy permission with delete request api
    public function destroy(Permission $permission)
    {
        //delete the permission
        $permission->delete();

        //redirect to the permissions index
        return redirect()->route('permissions.index');
    }

    

    //detach permission from role with delete request api
    public function detach(Request $request, Permission $permission)
    {
        //detach the permission from the role
        $permission->removeRole($request->role_id);

        //redirect to the permissions index
        return redirect()->route('permissions.index');
    }

    //sync permissions with role with put request api
    public function syncRole(Request $request, Role $role)
    {

        //validate the request
        $request->validate([
            'permission_ids' => 'required|array',
            'permission_ids.*' => 'exists:permissions,id',
        ]);

        //get the permissions from the request
        $permissions = Permission::whereIn('id', $request->permission_ids)->get();

        //sync the permissions with the role
        $role->syncPermissions($permissions);

        //redirect to the permissions index
        return redirect()->route('permissions.index');
    }

    //store role with post request api
    public function storeRole(Request $request)
    {
        //validate the request
        $request->validate([
            'name' => 'required',
        ]);

        //create the role
        Role::create($request->all());

        //redirect to the permissions index
        return redirect()->route('permissions.index');
    }

    //update role with put request api
    public function updateRole(Request $request, Role $role)
    {
        //validate the request
        $request->validate([
            'name' => 'required',
        ]);

        //update the role
        $role->update($request->all());

        //redirect to the permissions index
        return redirect()->route('permissions.index');
    }

    //destroy role with delete request api
    public function destroyRole(Role $role)
    {
        //delete the role
        $role->delete();

        //redirect to the permissions index
        return redirect()->route('permissions.index');
    }
}
