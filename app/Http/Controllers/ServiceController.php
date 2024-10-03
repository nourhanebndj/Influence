<?php

namespace App\Http\Controllers;

use App\Models\Category;

class ServiceController extends Controller
{
    public function index()
    {
        $categories = Category::with('subcategories.subsubcategories')->get();

        return view('pages.Services', compact('categories'));
    }
}