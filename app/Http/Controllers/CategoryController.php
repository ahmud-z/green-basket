<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::paginate(12);

        return view('pages.categories.index', compact('categories'));
    }

    public function show() {
        $categories = Category::paginate(12);

        return view('pages.categories.show', compact('categories'));
    }
}
