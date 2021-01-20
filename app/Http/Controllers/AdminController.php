<?php

namespace App\Http\Controllers;

// Use default
use Illuminate\Http\Request;
use Carbon\Carbon;

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
}
