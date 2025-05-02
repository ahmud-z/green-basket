<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function index()
    {

        $categories = Category::all();

        $products = Product::query();

        if (request()->has('category')) {
            $products->whereHas('category', function ($query) {
                $query->where('name', request()->get('category'));
            });
        }

        $products = $products->paginate(9)->withQueryString();

        return view('pages.products.index', compact('products', 'categories'));
    }

    public function show($productId)
    {
        $product = Product::findOrFail($productId)->load('category');

        $relatedProducts = [];

        try {

            $relatedProductIds = Http::get('https://green-basket-recommendation-api.onrender.com/?product_name=' . $product->name)->json();

            $relatedProducts = Product::whereIn('id', $relatedProductIds['products'])->get();
        } catch (\Throwable $th) {}


        return view('pages.products.show', compact('product', 'relatedProducts'));
    }
}
