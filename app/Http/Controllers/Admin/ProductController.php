<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFromRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function create(){
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.product.create', compact('brands', 'categories'));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'name' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'slug' => 'required|unique:products,slug',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sale_percent' => 'required|numeric',
            'status' => 'nullable',
            'trending' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/product/', $filename);

            $validatedData['image'] = 'uploads/product/' . $filename;
        }
        else
        {
            $validatedData['image'] = null;
        }

        $product = Product::query()->create([
            'category_id' => $validatedData['category_id'],
            'brand_id' => $validatedData['brand_id'],
            'name' => $validatedData['name'],
            'price' => $validatedData['price'],
            'quantity' => $validatedData['quantity'],
            'slug' => $validatedData['slug'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'],
            'sale_percent' => $validatedData['sale_percent'],
            'status' => $request->true ? 1 : 0,
            'trending' => $request->true ? 1 : 0,
        ]);
        return redirect()->route('admin.product.index')->with('success', 'Product created successfully');
    }
    public function edit($id){
        $products = Product::query()->findOrFail($id);
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.product.edit', compact('products', 'brands', 'categories'));
    }

    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'name' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'slug' => 'required|unique:products,slug',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sale_percent' => 'required|numeric',
            'status' => 'nullable',
            'trending' => 'nullable',
        ]);

        $product = Product::query()->find($id);
        if ($request->hasFile('image')) {
            $destination=$product->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/product/', $filename);

            $validatedData['image'] = 'uploads/product/' . $filename;
        }

        $product = Product::query()->findOrFail($id)->update([
            'category_id' => $validatedData['category_id'],
            'brand_id' => $validatedData['brand_id'],
            'name' => $validatedData['name'],
            'price' => $validatedData['price'],
            'quantity' => $validatedData['quantity'],
            'slug' => $validatedData['slug'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'],
            'sale_percent' => $validatedData['sale_percent'],
            'status' => $request->true ? 1 : 0,
            'trending' => $request->true ? 1 : 0,
        ]);
        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully');
    }

    public function destroy($id){
        $product = Product::query()->findOrFail($id);
        $destination=$product->image;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $product->delete();
        return redirect()->route('admin.product.index')->with('success', 'Product deleted successfully');
    }
}
