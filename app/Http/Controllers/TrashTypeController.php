<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\TrashType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrashTypeController extends Controller
{
    public function index()
    {
        $title = 'type';
        $types = TrashType::get();
        return view('admin.type', compact('title', 'types'));
    }
    public function create()
    {
        $title = 'type';
        $categories = Category::get();
        return view('admin.add_type', compact('title', 'categories'));
    }
    public function store(Request $req)
    {
        $validated = $req->validate([
            'name' => 'required|min:3',
            'price' => 'required|numeric|min:1000',
            'slug' => 'required|unique:trash_types,slug',
            'desc' => 'required',
            'category_id' => 'required'
        ]);
        if ($req->hasFile('picture')) {
            $req->validate([
                'picture' => 'image|mimes:png,jpg|max:1024'
            ]);
            $file = $req->file('picture');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/TrashImage'), $filename);
            $validated['picture'] = $filename;
        }
        try {
            $store = TrashType::create($validated);
            return redirect()->route('admin.type')->with('success', 'Add new type is success');
        } catch (\Exception $th) {
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }
    // public function update(Request $req, Category $category)
    // {
    //     $validated = $req->validate([
    //         'name' => 'required|min:3',
    //         'desc' => 'required'
    //     ]);

    //     try {
    //         $store = $category->update($validated);
    //         return redirect()->route('admin.category')->with('success', 'Update category data is success');
    //     } catch (\Exception $th) {
    //         return redirect()->back()->withErrors(['error', $th->getMessage()])->withInput();
    //     }
    // }

    // public function edit(Category $category)
    // {
    //     $title = "category";
    //     return view('admin.edit_category', compact('title', 'category'));
    // }

    public function destroy(TrashType $type)
    {
        try {
            Storage::delete(public_path('public/TrashImage' . $type->picture));
            $type->delete();
            return redirect()->route('admin.type')->with('success', 'Delete trash type data is success');
        } catch (\Exception $th) {
            return redirect()->back()->withErrors('error', $th->getMessage())->withInput();
        }
    }
}
