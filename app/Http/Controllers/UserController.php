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
use App\Models\Notification;

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
            session()->flash('notify_danger', 'Email or password is incorrect');
            return redirect()->back();
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
            session()->flash('notify_warning', 'First name is required.');
            return redirect()->back();
        }
        if(!$req->last_name){
            session()->flash('notify_warning', 'Last name is required.');
            return redirect()->back();
        }
        if($req->file('img')){
            $personal_image = $req->file('img');
            $image_name = md5(Carbon::now().rand(1,10)).'.'.$personal_image->getClientOriginalExtension();
            $image_full_name = '/'.'img/users/'.$image_name;
        }
        if(!$req->email){
            session()->flash('notify_warning', 'Email is required.');
            return redirect()->back();
        }
        $user = User::where('email', $req->email)->first();
        if($user){
            session()->flash('notify_warning', 'Email is already exists, please try another one.');
            return redirect()->back();
        }
        if(!$req->password){
            session()->flash('notify_warning', 'Password is required.');
            return redirect()->back();
        }
        if(!$req->confirm_password){
            session()->flash('notify_warning', 'Confirm password is required.');
            return redirect()->back();
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
                session()->flash('notify_success', 'You have successfully registered.');
                return redirect()->back();
            }else{
                session()->flash('notify_danger', 'Connection error, please try again later.');
                return redirect()->back();
            }

        }else{
            session()->flash('notify_warning', 'Confirm password is incorrect.');
            return redirect()->back();
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
            session()->flash('notify_warning', 'First name is required.');
            return redirect()->back();
        }
        if(!$req->last_name){
            session()->flash('notify_warning', 'Last name is required.');
            return redirect()->back();
        }
        if(!$req->email){
            session()->flash('notify_warning', 'Email is required.');
            return redirect()->back();
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
                    session()->flash('notify_warning', 'If you have wrote current password, than new password is required.');
                    return redirect()->back();
                }
                if($req->new_password == $req->confirm_password){
                    $user->password = Hash::make($req->new_password);
                }else{
                    session()->flash('notify_warning', 'Confirm password is incorrect.');
                    return redirect()->back();
                }
            }else{
                session()->flash('notify_warning', 'Current password is incorrect.');
                return redirect()->back();
            }
        }else{
            if($req->new_password || $req->confirm_password){
                session()->flash('notify_warning', 'Please write current password for changing.');
                return redirect()->back();
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
            session()->flash('notify_success', 'Your data was successfully updated.');
            return redirect()->back();
        }else{
            session()->flash('notify_danger', 'Connection error, please try again later.');
            return redirect()->back();
        }
    }

    // Get home page products from db
    function getHomePage (){
        $slider_products = Product::where('slider', '1')->whereNotIn('in_stock', [0])->orderByDesc('id')->where('status', '1')->limit(12)->get();
        $top_products = Product::where('top', '1')->whereNotIn('in_stock', [0])->orderByDesc('id')->where('status', '1')->limit(12)->get();
        $all_products = Product::orderByDesc('id')->where('status', '1')->get();

        return view('home', ['all_product' => $all_products, 'top_products' => $top_products, 'slider_products' => $slider_products]);
    }

    // Get product details
    function getDetails ($id){
        $product = Product::where('status', '1')->find($id);
        $gallery = Gallery::where('product_id', $id)->get();

        if($product){
            return view('details', ['details' => $product, 'gallery' => $gallery]);
        }else{
            session()->flash('notify_danger', 'Sorry but this product is not available now.');
            return redirect()->back();
        }
    }

    // Remove user profile image
    function removeUserImg (){
        $user = User::find(session()->get('user')->id);
        $image_old = $user->img;
        $user->img = '/img/users/no_user_img.jpg';
        $user->save();
        if(File::exists(public_path($image_old))){
            File::delete(public_path($image_old));
        }
        session()->flash('notify_success', 'Your profile image was successfully removed.');
        return redirect()->back();
    }

    // Get user notifications
    public function getUserNotifications (){
        // return response()->json(["Im working..."]);
        $user_id = session()->get('user')->id;
        $notifications = Notification::orderByDesc('id')->where('status', '0')->orWhere('status', '1')->where('user_id', $user_id)->get();
        return $notifications;
    }

    // Remove user message
    public function removeMessage (Request $req){
        // Take user id
        $user_id = session()->get('user')->id;

        // Check user with that id
        $notification = Notification::find($req->target);

        // CHeck user id with target's user id
        if($notification->user_id == $user_id){
            $notification->status = '2';
            $result = $notification->save();
        }
    }

    // Notifications are seen by user
    public function notifisSeen (){
        // Take user id
        $user_id = session()->get('user')->id;

        Notification::where('user_id', $user_id)->where('status', '0')->update(['status' => '1']);
    }
}
