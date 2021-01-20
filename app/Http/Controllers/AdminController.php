<?php

namespace App\Http\Controllers;

// Use default
use Illuminate\Http\Request;
use Carbon\Carbon;

// Use models
use App\Models\Product;

class AdminController extends Controller
{
    // Add product
    function addProduct (Request $req){
        $product = new Product;

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

        $result = $product->save();

        if($result){
            $general_image->move(base_path('\public\img\products'), $image_name);
            return "Product was successfully added.";
        }else{
            return "Connection error, please try again later";
        }
    }
}
