<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        $categories = Category::all();
        $brands = Brand::all();
        $getRandomProducts = Product::inRandomOrder()->limit(3)->get();
        return view('user.dashboard', compact('products', 'categories', 'brands', 'getRandomProducts'));
    }

    public function showProduct(){
        $products = Product::all();
        $categories = Category::all();
        $brands = Brand::all();
        return view('user.product', compact('products', 'categories', 'brands'));
    }

    public function showCart(){
        $products = Product::all();
        $categories = Category::all();
        $brands = Brand::all();
        return view('user.cart', compact('products', 'categories', 'brands'));
    }
}
