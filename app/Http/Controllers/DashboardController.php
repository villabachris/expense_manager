<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        // dd('hello');
        // dd($user_rname->roles);
        return view('dashboard');
    }
    
    public function roles()
    {
        // dd(User::all());
        return view('roles');
        // return $user_roles;
    }
    
    public function users()
    {
        // $user_rname = User::with('roles')->orderBy('created_at', 'desc')->get();
        // $users = User::orderBy('created_at', 'desc')->get();
        // dd($users);
        // return $users;
        $role = Role::all();
        return response()->json($role);
    }
    
    public function allUsers()
    {
        $users = User::all();
        // dd($users);
        // dd($users);
        return view('users', compact('users'));
    }
    
    public function allUsersApi()
    {
        $users = DB::table('roles')
        ->rightJoin('users', 'roles.id', '=', 'users.role_id')->get();
        return response()->json($users);
    }
    
    public function addRole(Request $request)
    {
        $role = new Role();
        $role->role = $request->role;
        $role->description = $request->description;
        $role->save();
        return response()->json(['message' => 'Add Role Successful']);
    }
    
    public function updateRole(Request $request, $id)
    {   
        $role = Role::where('id', $id)->first();
        $role->role = $request->get('role');
        $role->description = $request->get('desc');
        $role->save();
        return response()->json(['message' => 'Updated Role Successful']);
        // return response()->json([$request->all()]);
    }


}
