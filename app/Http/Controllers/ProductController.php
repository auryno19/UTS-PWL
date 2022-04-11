<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view('product',[
            "title"=>"Product",
            "product" => Product::latest()->get()
        ]);
    }

    public function show($id){
         return view('productDetail',[
            "title"=>"Product",
            'product' => Product::find($id)
        ]);
    }
}
