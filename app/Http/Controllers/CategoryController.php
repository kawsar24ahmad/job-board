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
        
        return redirect()->route('category.index')->with('success', 'Category created successfully.');
    }
    public function delete($id)  
    {
        $category = Category::find($id);
    
        if (!$category) {
            return redirect()->route('category.index')->with('error', 'Category not found.');
        }
    
        // Check if category has related job posts
        // if ($category->jobPosts()->count() > 0) {
        //     return redirect()->route('category.index')->with('error', 'Cannot delete category with active job posts.');
        // }
    
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
    }
    
}
