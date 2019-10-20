<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

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
        $user_roles = User::all();
        return view('roles', compact('user_roles'));
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
    
    public function addRole(Request $request)
    {
        $role = new Role();
        $role->role = $request->role;
        $role->description = $request->description;
        $role->save();
        return response()->json(['message' => 'Add Role Successful']);
    }

}
