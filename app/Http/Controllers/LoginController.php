<?php

namespace App\Http\Controllers;
use App\User;
use Auth;
use Hash;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\UserCollection;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email'.$request->get('id'),
            'username' => 'required|max:255',
            'password' => 'required|min:6',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->role_id = null;
        $user->save();
        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function login(Request $request){
        $userdata = [
            'username' => $request->username,    
            'password' => $request->password    
        ];
        // dd($userdata);
        // dd(Auth::attempt($credentials));
        if (Auth::attempt($userdata)) {
            return redirect('/dashboard');
        }else{
            return redirect('/');
        }
    }
}
