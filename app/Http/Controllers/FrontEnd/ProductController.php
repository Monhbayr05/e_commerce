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
        return view('user.dashboard', compact('products', 'categories', 'brands'));
    }


}
