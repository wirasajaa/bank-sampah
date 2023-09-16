<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $title = "dashboard";
        return view('admin.index', compact('title'));
    }
    public function type()
    {
        $title = "type";
        return view('admin.index', compact('title'));
    }
    public function category()
    {
        $categories = Category::get();
        $title = "category";
        return view('admin.category', compact('title', "categories"));
    }
}
