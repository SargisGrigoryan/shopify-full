<?php

namespace App\Http\Controllers;

// Use default
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Hash;
use File;

// Use models
use App\Models\User;
use App\Models\Product;
use App\Models\Gallery;

class UserController extends Controller
{
    // Login
    function login(Request $req){
        // Find account
        $user = User::where('email', $req->email)->first();
        if($user && Hash::check($req->password, $user->password)){
            // Put sessions
            session()->put('user', $user);

            // Keep cookies if user set remember me
            if($req->remember){
                cookie()->queue('remember_user', $user->id, 30000);
            }

            // After all redirect to home page
            return redirect('/');

        }else{
            return "Email or password is incorrect";
        }
    }

    // Logout
    function logout(){
        // Remove user sessions
        session()->pull('user');
        session()->pull('admin');

        // Remove user cookies
        cookie()->queue('remember_user', '', -30000);
        cookie()->queue('remember_admin', '', -30000);

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
        $image_full_name = '/img/users/no_user_img.jpg';
        $personal_image = null;

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
                if($personal_image != null){
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

    // User settings page
    function userSettings (){
        $user = User::find(session()->get('user')->id);

        return view('userSettings', ['userData' => $user]);
    }

    // Save user settings
    function saveUserDatas (Request $req){
        // Check all required fileds
        if(!$req->first_name){
            return "First name is required.";
        }
        if(!$req->last_name){
            return "Last name is required.";
        }
        if(!$req->email){
            return "Email is required.";
        }

        $user = User::find(session()->get('user')->id);

        // Common data
        $user->first_name = $req->first_name;
        $user->last_name = $req->last_name;
        $user->email = $req->email;

        // Password
        if($req->current_password){
            if(Hash::check($req->current_password, $user->password)){
                if(!$req->new_password){
                    return "If you wrote current password than new password is required.";
                }
                if($req->new_password == $req->confirm_password){
                    $user->password = Hash::make($req->new_password);
                }else{
                    return "Confirm password is incorrect";
                }
            }else{
                return "Current password is incorrect";
            }
        }else{
            if($req->new_password || $req->confirm_password){
                return "Please write current password for changing.";
            }
        }

        // Personal image
        if($req->file('img')){
            // Take old image src
            $personal_img_old = $user->img;

            // Make new image
            $personal_img_new = $req->file('img');
            $image_name = md5(Carbon::now().rand(1,10)).'.'.$personal_img_new->getClientOriginalExtension();
            $user->img = '/'.'img/users/'.$image_name;
        }

        $result = $user->save();

        if($result){
            if($req->file('img')){
                if($personal_img_old != '/img/users/no_user_img.jpg'){
                    if(File::exists(public_path($personal_img_old))){
                        File::delete(public_path($personal_img_old));
                    }
                }
                $personal_img_new->move(base_path('\public\img\users'), $image_name);
            }
            return "Your data was successfully updated.";
        }else{
            return "Connection error, please try again later.";
        }
    }

    // Get home page products from db
    function getHomePage (){
        $all_products = Product::orderByDesc('id')->where('status', '1')->get();

        return view('home', ['all_product' => $all_products]);
    }

    // Get product details
    function getDetails ($id){
        $product = Product::where('status', '1')->find($id);
        $gallery = Gallery::where('product_id', $id)->get();

        if($product){
            return view('details', ['details' => $product, 'gallery' => $gallery]);
        }else{
            return "Sorry but this product is not available now.";
        }
    }
}
