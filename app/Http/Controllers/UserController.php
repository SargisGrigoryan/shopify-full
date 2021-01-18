<?php

namespace App\Http\Controllers;

// Use default
use Illuminate\Http\Request;
use Hash;
use Session;

// Use models
use App\Models\User;

class UserController extends Controller
{
    // Login
    function login(Request $req){
        // Find account
        $user = User::where('email', $req->email)->first();
        if($user && Hash::check($req->password, $user->password)){
            // Put sessions
            session::put('user', $user);

            if($req->remember){
                cookie()->queue('remember_user', $user->id, 30000);
            }

            return redirect('/');

        }else{
            return "Email or password is incorrect";
        }
    }

    // Logout
    function logout(){
        // Remove user sessions
        session::pull('user');

        // Remove user cookies
        cookie()->queue('remember_user', -30000);

        // Redirect user
        return redirect('/login');
    }

    // Remember user
    static function rememberUser($id){
        // Find user
        $user = User::find($id);

        // Remove old sessions
        session()->pull('user');

        // Make new sessions
        session()->put('user', $user);
    }
}
