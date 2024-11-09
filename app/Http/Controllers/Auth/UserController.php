<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    //index
    public function index()
    {
        //get all users
        $users = User::all();

        //return the users with a view
        return view('users.index', compact('users'));
    }

    //show
    public function show(User $user)
    {
        //show the user
        return view('users.show', compact('user'));
    }

    //edit
    public function edit(User $user)
    {
        //edit the user
        return view('users.edit', compact('user'));
    }

    
    //update
    public function update(Request $request, User $user)
    {
        //validate the request
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        
        //update the user
        $user->update($request->all());
        
        //redirect to the users index
        return redirect()->route('users.index');
    }
    
    //destroy
    public function destroy(User $user)
    {
        //delete the user
        $user->delete();
        
        //redirect to the users index
        return redirect()->route('users.index');
    }

    //edit permissions
    public function syncRolesEdit(User $user)
    {
        //modify permissions
        $permissions = Permission::all();
        $roles = Role::all();

        //edit the user
        return view('users.sync_roles_edit', compact('user', 'permissions', 'roles'));
    }

    //attach roles
    public function syncRolesUpdate(Request $request, User $user)
    {
        //validate the request
        $request->validate([
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,name',
        ]);

        //attach the roles
        $user->syncRoles($request->roles);

        //redirect to the users index
        return redirect()->route('users.index');
    }
}
