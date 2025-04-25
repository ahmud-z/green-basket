<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function home()
    {
        $category = Category::where('name', 'Groceries')->first();

        $organicProducts = Product::where('category_id', $category->id)->take(8)->get();

        $topCategories = Category::take(4)->get();

        return view('home', compact('organicProducts', 'topCategories'));
    }
}
