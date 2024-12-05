<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        $brands = Brand::all();
        return view('admin.brand.index', compact('brands'));
    }

    public function create(){
        return view('admin.brand.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
           'name' => 'required|unique:brands|max:255',
           'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           'status' => 'nullable',
        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/brand/', $filename);

            $validatedData['image'] = 'uploads/brand/'.$filename;
        }
        else
        {
            $validatedData['image'] = null;
        }

        Brand::query()->create([
            'name'=>$validatedData['name'],
            'image'=>$validatedData['image'],
            'status'=>$request->status == true ? 1 : 0,
        ]);

        return redirect()->route('admin.brands.index')->with('success', 'Brand added successfully');
    }
}
