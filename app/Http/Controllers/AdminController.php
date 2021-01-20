<?php

namespace App\Http\Controllers;

// Use default
use Illuminate\Http\Request;
use Carbon\Carbon;
use File;

// Use models
use App\Models\Product;
use App\Models\Gallery;

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
}
