<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::get();

        return view('products', compact('products'));
    }

    public function details($productId)
    {
        $product = Product::findOrFail($productId)->load('category');

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->limit(8)
            ->get();

        return view('product-details', compact('product', 'relatedProducts'));
    }
}
