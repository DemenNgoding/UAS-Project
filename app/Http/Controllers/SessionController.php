<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function index() {
        return view("welcome");
    }

    public function login(Request $request) {
        $request->validate([
            // Validate email and password from login form
            "email"=> "required",
            "password"=> "required",
        ]);

        // Authentication
        $loginInfo = [
            'email'=> $request->email,
            'password'=> $request->password,
        ];

        if(Auth::attempt($loginInfo)) {
            // if the login success
            return redirect('home');
        } else {
            // if the login failed
            return redirect('login')->with('error','Wrong email or password');
        }
    }

    public function register(request $request) {
        $request->validate([
            // Validate name, email, and password from register form
            "name"=>"required",
            "email"=> "required|email|unique:users", // |email used for check if the email are valid, and |unique used for check to database if the email is uniwue
            "password"=> "required|min:8", // |min used for minimun password are 8 character
        ],[
            'email.email' => 'Input a valid email',
            'email.unique' => 'Email already taken',
            'password.min' => 'minimum 8 character for password',
        ]);

        // Authentication
        $registerInfo = [   
            "name"=> $request->name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
        ];

        // Store register into users table
        User::create($registerInfo);

        $loginInfo = [
            'email'=> $request->email,
            'password'=> $request->password,
        ];

        if(Auth::attempt($loginInfo)) {
            // if the login success
            return redirect('reg_profile/{user_id}');
        }
    }   

    public function logout() {
        Auth::logout();
        return redirect("/");
    }

}