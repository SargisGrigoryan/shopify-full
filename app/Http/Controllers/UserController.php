<?php

namespace App\Http\Controllers;

// Use default
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Hash;

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
            session()->put('user', $user);

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
        session()->pull('user');

        // Remove user cookies
        cookie()->queue('remember_user', '', -30000);

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

    // Get user profile
    function profile (){
        $user = User::find(session::get('user')->id);

        return view('profile', ['userData' => $user]);
    }

    // Register new user
    function register (Request $req){
        // Default vars
        $image_full_name = null;

        // Check all required fileds
        if(!$req->first_name){
            return "First name is required.";
        }
        if(!$req->last_name){
            return "Last name is required.";
        }
        if($req->file('img')){
            $personal_image = $req->file('img');
            $image_name = md5(Carbon::now().rand(1,10)).'.'.$personal_image->getClientOriginalExtension();
            $image_full_name = '/'.'img/users/'.$image_name;
        }
        if(!$req->email){
            return "Email is required.";
        }
        $user = User::where('email', $req->email)->first();
        if($user){
            return "Email is already exists, please try another one.";
        }
        if(!$req->password){
            return "Password is required.";
        }
        if(!$req->confirm_password){
            return "Confirm password is required.";
        }

        // check password confirmation
        if($req->password == $req->confirm_password){
            $new_user = new User;

            $new_user->first_name = $req->first_name;
            $new_user->last_name = $req->last_name;
            $new_user->img = $image_full_name;
            $new_user->email = $req->email;
            $new_user->password = Hash::make($req->password);

            $result = $new_user->save();

            if($result){
                if($image_full_name != null){
                    $personal_image->move(base_path('\public\img\users'), $image_name);
                }
                return "You have successfully registered.";
            }else{
                return "Connection error, please try again later.";
            }

        }else{
            return "Confirm password is incorrect.";
        }
    }
}
