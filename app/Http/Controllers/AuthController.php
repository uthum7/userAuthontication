<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function home(){
        $users =User::all();
        return view("welcome",compact('users'));
    }
    public function login(){
        return view("auth.login");
    }
    function loginPost(Request $request){
        $request->validate([
            "email"=>"required",
            "password"=>"required",
        ]);
        $credentials = $request->only("email","password");
        if(Auth::attempt($credentials)){
            return redirect()->intended(route("home"));
        }
        return redirect(route("login"))->with("error","Login failed");
    }
    function register(){
        return view("auth.register");
    }
    function registerPost(Request $request){
        $request->validate([
            "fullname"=>"required",
            "email"=>"required",
            "password"=>"required",
        ]);
        $user = new User();
        $user->name = $request->fullname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if($user->save()){
            return redirect(route("login"))
            ->with("success","User created successfully");
        }
        return redirect(route("register"))->with("error","Faild to create account");
    }
    public function edit($id){
       $users =User::where('id',$id)->first();
       return view("auth.editeRegister",compact('users'));
    }
    public function update(Request $request,$user_id){
       $users =User::where('id',$user_id)->first();

       $users->name= $request->fullname;
       $users->email =  $request->email;
       $users->password =  $request->password;

       $users->save();

       return redirect()->route('home');
    }
    public function delete($user_id){
        User::where('id',$user_id)->delete();
        return redirect()->route('home');
    }
}
