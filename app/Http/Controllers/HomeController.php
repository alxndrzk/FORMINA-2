<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $products = Product::all();
        // dd($products[1]->product_name);
        return view('home.index',compact('products'));
    }

    public function katalog(){
        $products = Product::all();
        return view('home.katalog',compact('products'));
    }
}
