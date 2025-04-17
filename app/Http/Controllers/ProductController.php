<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {

        $categories = Category::all();

        $products = Product::query();

        if (request()->has('category')) {
            $products->whereHas('category', function($query) {
                $query->where('name', request()->get('category'));
            });
        }

        $products = $products->paginate(9)->withQueryString();

        return view('pages.products.index', compact('products', 'categories'));
    }

    public function show($productId)
    {
        $product = Product::findOrFail($productId)->load('category');

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->limit(8)
            ->get();

        return view('pages.products.show', compact('product', 'relatedProducts'));
    }
}
