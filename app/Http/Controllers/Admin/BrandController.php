<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
    public function edit($id){
        $brands = Brand::query()->find($id);
        return view('admin.brand.edit', compact('brands'));
    }
    public function update(Request $request, $id){
        $validatedData = $request->validate([
           'name' => 'required|max:255',
           'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           'status' => 'nullable',
        ]);

        $brand = Brand::query()->find($id);
        if($request->hasFile('image')){
            $destination = $brand->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/brand/', $filename);
            $validatedData['image'] = 'uploads/brand/'.$filename;
        }
        else
        {
            $validatedData['image'] = $brand->image;
        }
        Brand::query()->find($id)->update([
           'name'=>$validatedData['name'],
           'image'=>$validatedData['image'],
           'status'
        ]);
        return redirect()->route('admin.brands.index')->with('success', 'Brand updated successfully');
    }
    public function destroy($id){
        $brand = Brand::query()->find($id);
        $destination = $brand->image;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $brand->delete();
        return redirect()->route('admin.brands.index')->with('success', 'Brand deleted successfully');
    }
}
