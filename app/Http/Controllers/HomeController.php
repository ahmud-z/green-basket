<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function home()
    {
        $category = Category::where('name', 'Groceries')->first();

        $organicProducts = Product::where('category_id', $category->id)->take(10)->get();

        $topCategories = Category::take(4)->get();

        $topSellingProducts = Product::query()
            ->withCount('orderItem')
            ->orderBy('order_item_count', 'desc')
            ->take(10)
            ->get();

        return view('home', compact('organicProducts', 'topCategories', 'topSellingProducts'));
    }
}
