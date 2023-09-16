<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        $title = "category";
        return view('admin.add_category', compact('title'));
    }

    public function store(Request $req)
    {
        $validated = $req->validate([
            'name' => 'required|min:3',
            'desc' => 'required'
        ]);

        try {
            $store = Category::create($validated);
            return redirect()->route('admin.category')->with('success', 'Add new category is success');
        } catch (\Exception $th) {
            return redirect()->back()->withErrors(['error', $th->getMessage()])->withInput();
        }
    }
    public function update(Request $req, Category $category)
    {
        $validated = $req->validate([
            'name' => 'required|min:3',
            'desc' => 'required'
        ]);

        try {
            $store = $category->update($validated);
            return redirect()->route('admin.category')->with('success', 'Update category data is success');
        } catch (\Exception $th) {
            return redirect()->back()->withErrors(['error', $th->getMessage()])->withInput();
        }
    }

    public function edit(Category $category)
    {
        $title = "category";
        return view('admin.edit_category', compact('title', 'category'));
    }

    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return redirect()->route('admin.category')->with('success', 'Delete category data is success');
        } catch (\Exception $th) {
            return redirect()->back()->withErrors(['error', $th->getMessage()])->withInput();
        }
        return dd($category);
    }
}
