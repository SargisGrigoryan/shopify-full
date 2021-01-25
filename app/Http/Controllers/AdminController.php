<?php

namespace App\Http\Controllers;

// Use default
use Illuminate\Http\Request;
use Carbon\Carbon;
use File;
use Hash;

// Use models
use App\Models\Product;
use App\Models\Gallery;
use App\Models\Admin;

class AdminController extends Controller
{
    // Add product
    function addProduct (Request $req){
        $product = new Product;

        // Product data
        $product->name_en = $req->name_en;
        $product->name_ru = $req->name_ru;
        $product->descr_en = $req->descr_en;
        $product->descr_ru = $req->descr_ru;
        $general_image = $req->file('general_img');
        $image_name = md5(Carbon::now().rand(1,10)).'.'.$general_image->getClientOriginalExtension();
        $product->img   = '/'.'img/products/'.$image_name;
        $product->price = $req->price;
        $product->discount = $req->discount;
        $product->in_stock = $req->in_stock;
        $product->options_en = $req->options_en;
        $product->options_ru = $req->options_ru;
        $product->slider = $req->slider;
        $product->top = $req->top;
        $product->status = $req->status;

        // Gallery
        $gallery_1 = $req->file('gallery_1');
        $gallery_2 = $req->file('gallery_2');
        $gallery_3 = $req->file('gallery_3');

        $result = $product->save();

        if($result){
            // Save gallery after adding product in db
            if($gallery_1){
                $gallery = new Gallery;
                $gallery_1_name = md5(Carbon::now().rand(1,10)).'.'.$gallery_1->getClientOriginalExtension();
                $gallery->product_id = $product->id;
                $gallery->src = '/'.'img/products/'.$gallery_1_name;
                $result = $gallery->save();
                if($result){
                    $gallery_1->move(base_path('\public\img\products'), $gallery_1_name);
                }
            }
            if($gallery_2){
                $gallery = new Gallery;
                $gallery_2_name = md5(Carbon::now().rand(1,10)).'.'.$gallery_2->getClientOriginalExtension();
                $gallery->product_id = $product->id;
                $gallery->src = '/'.'img/products/'.$gallery_2_name;
                $result = $gallery->save();
                if($result){
                    $gallery_2->move(base_path('\public\img\products'), $gallery_2_name);
                }
            }
            if($gallery_3){
                $gallery = new Gallery;
                $gallery_3_name = md5(Carbon::now().rand(1,10)).'.'.$gallery_3->getClientOriginalExtension();
                $gallery->product_id = $product->id;
                $gallery->src = '/'.'img/products/'.$gallery_3_name;
                $result = $gallery->save();
                if($result){
                    $gallery_3->move(base_path('\public\img\products'), $gallery_3_name);
                }
            }
            $general_image->move(base_path('\public\img\products'), $image_name);
            return "Product was successfully added.";
        }else{
            return "Connection error, please try again later";
        }
    }

    // Edit product
    function editProduct ($id){
        $product = Product::find($id);
        $gallery = Gallery::where('product_id', $id)->get();

        return view('editProduct', ['data' => $product, 'gallery' => $gallery]);
    }

    // Save product
    function saveProduct (Request $req){
        $product = Product::find($req->product_id);

        // Product data
        $product->name_en = $req->name_en;
        $product->name_ru = $req->name_ru;
        $product->descr_en = $req->descr_en;
        $product->descr_ru = $req->descr_ru;
        $general_image = $req->file('general_img');
        if($general_image){
            $image_name = md5(Carbon::now().rand(1,10)).'.'.$general_image->getClientOriginalExtension();
            $image_old = $product->img;
            if(File::exists(public_path($image_old))){
                File::delete(public_path($image_old));
            }
            $product->img   = '/'.'img/products/'.$image_name;
        }
        $product->price = $req->price;
        $product->discount = $req->discount;
        $product->in_stock = $req->in_stock;
        $product->options_en = $req->options_en;
        $product->options_ru = $req->options_ru;
        $product->slider = $req->slider;
        $product->top = $req->top;
        $product->status = $req->status;

        $result = $product->save();

        if($result){
            // Take gallery images from db
            $gallery_1 = Gallery::where('product_id', $req->product_id)->first();
            $gallery_2 = Gallery::where('product_id', $req->product_id)->skip(1)->first();
            $gallery_3 = Gallery::where('product_id', $req->product_id)->skip(2)->first();

            // Get gallery images from admin
            $gallery_image_1 = $req->gallery_1;
            $gallery_image_2 = $req->gallery_2;
            $gallery_image_3 = $req->gallery_3;

            // Gallery 1 changing or adding
            if($gallery_image_1){
                $gallery_name_1 = md5(Carbon::now().rand(1,10)).'.'.$gallery_image_1->getClientOriginalExtension();
                if($gallery_1){
                    $gallery_1_old = $gallery_1->src;

                    if(File::exists(public_path($gallery_1_old))){
                        File::delete(public_path($gallery_1_old));
                    }
                    $gallery_1->src = '/'.'img/products/'.$gallery_name_1;
                    $gallery_1->save();
                    $gallery_image_1->move(base_path('\public\img\products'), $gallery_name_1);
                }else{
                    $gallery_1 = new Gallery;
                    $gallery_1->src = '/'.'img/products/'.$gallery_name_1;
                    $gallery_1->product_id = $req->product_id;
                    $gallery_1->save();
                    $gallery_image_1->move(base_path('\public\img\products'), $gallery_name_1);
                }
            }

            // Gallery 2 changing or adding
            if($gallery_image_2){
                $gallery_name_2 = md5(Carbon::now().rand(1,10)).'.'.$gallery_image_2->getClientOriginalExtension();
                if($gallery_2){
                    $gallery_2_old = $gallery_2->src;

                    if(File::exists(public_path($gallery_2_old))){
                        File::delete(public_path($gallery_2_old));
                    }
                    $gallery_2->src = '/'.'img/products/'.$gallery_name_2;
                    $gallery_2->save();
                    $gallery_image_2->move(base_path('\public\img\products'), $gallery_name_2);
                }else{
                    $gallery_2 = new Gallery;
                    $gallery_2->src = '/'.'img/products/'.$gallery_name_2;
                    $gallery_2->product_id = $req->product_id;
                    $gallery_2->save();
                    $gallery_image_2->move(base_path('\public\img\products'), $gallery_name_2);
                }
            }

            // Gallery 3 changing or adding
            if($gallery_image_3){
                $gallery_name_3 = md5(Carbon::now().rand(1,10)).'.'.$gallery_image_3->getClientOriginalExtension();
                if($gallery_3){
                    $gallery_3_old = $gallery_3->src;

                    if(File::exists(public_path($gallery_3_old))){
                        File::delete(public_path($gallery_3_old));
                    }
                    $gallery_3->src = '/'.'img/products/'.$gallery_name_3;
                    $gallery_3->save();
                    $gallery_image_3->move(base_path('\public\img\products'), $gallery_name_3);
                }else{
                    $gallery_3 = new Gallery;
                    $gallery_3->src = '/'.'img/products/'.$gallery_name_3;
                    $gallery_3->product_id = $req->product_id;
                    $gallery_3->save();
                    $gallery_image_3->move(base_path('\public\img\products'), $gallery_name_3);
                }
            }

            if($general_image){
                $general_image->move(base_path('\public\img\products'), $image_name);
            }
            return "Product was successfully saved.";
        }else{
            return "Connection error, please try again later";
        }
    }

    // Login
    function adminLogin (Request $req){
        $admin = Admin::where('email', $req->email)->first();
        if($admin && Hash::check($req->password, $admin->password)){
            // Put session
            session()->put('admin', $admin);

            // Keep cookies if admin set remember me
            if($req->remember){
                cookie()->queue('remember_admin', $admin->id, 30000);
            }

            // After all redirect to home page
            return redirect('/');
            
        }else{
            return "Email or password is incorrect";
        }
    }

    // Get all products list
    function allProducts (){
        $products = Product::orderByDesc('id')->get();

        return view('allProducts', ['products' => $products]);
    }

    // Block product
    function blockProduct ($id){
        $product = Product::find($id);
        $product->status = '0';
        $result = $product->save();
        if($result){
            return "You have successfully blocked this product.";
        }else{
            return "Connection error, please try again later.";
        }
    }

    // Recover product
    function recoverProduct ($id){
        $product = Product::find($id);
        $product->status = '1';
        $result = $product->save();
        if($result){
            return "You have successfully recovered this product.";
        }else{
            return "Connection error, please try again later.";
        }
    }

    // Remove product
    function removeProduct ($id){
        // Get all product data
        $product = Product::find($id);
        $general_image = $product->img;

        // Remove general image from files
        if(File::exists(public_path($general_image))){
            File::delete(public_path($general_image));
        }

        // Remove Product from db
        $result = $product->delete();

        // Get all product gallery files
        $files = Gallery::where('product_id', $id)->get();

        // Check if product removed from db
        if($result){
            // Remove files also
            foreach($files as $file){
                if(File::exists(public_path($file->src))){
                    File::delete(public_path($file->src));
                }

                // After removing files remove files data from db
                $file_remove = Gallery::find($file->id)->delete();
            }
            return "Product was successfully removed.";
        }else{
            return "Connection error, please try again later";
        }
    }
}
