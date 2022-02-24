<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class categoryController extends Controller
{
    public function index() {
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    public function show($slug) {
        $category = Category::where('slug', '=', $slug)->first();
        
        if(!$category) {
            abort('404');
        }

        $posts = $category->posts;

        return view('admin.categories.show', compact('category', 'posts'));
    }
}
