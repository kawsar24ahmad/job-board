<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()  {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }
    public function create()  {
        
        return view('category.create');
    }
    public function store(Request $request)  {
        $request->validate([
            'name' => 'required|unique:categories,name|string',
        ]);

        Category::create([
            'name' => $request->name,
            'admin_id' => auth()->guard('admin')->user()->id,
        ]);

        flash()
        ->options([
            'position' => 'bottom-right',
        ])
        ->success('Category created successfully');
        
        return redirect()->route('category.index');
    }
    public function delete($id)  
    {
        $category = Category::find($id);
    
        if (!$category) {
            return redirect()->route('category.index')->with('error', 'Category not found.');
        }
    
        $category->delete();

        flash()
        ->options([
            'position' => 'bottom-right',
        ])
        ->success('Category deleted successfully');
        return redirect()->route('category.index');
    }
    
}
