<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
           'name' => 'required',
           'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/category/', $filename);

            $validatedData['image']='uploads/category/' . $filename;
        }


        else
        {
            $validatedData['image']=null;
        }

        Category::query()->create([
            'name'=>$validatedData['name'],
            'image'=>$validatedData['image'],
        ]);
        return redirect()->route('admin.categories.index')
            ->with('message','Post Created Successfully');
    }
}
