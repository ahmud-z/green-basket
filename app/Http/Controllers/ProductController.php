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

        if (count(request('filters.categories', [])) > 0) {
            $products->whereHas('category', function ($query) {
                $query->whereIn('name', request('filters.categories', []));
            });
        }

        if (request('sort') == 'ltoh') {
            $products->orderBy('price');
        } elseif (request('sort') == 'htol') {
            $products->orderBy('price', 'desc');
        } elseif (request('sort') == 'atoz') {
            $products->orderBy('name');
        } elseif (request('sort') == 'ztoa') {
            $products->orderBy('name', 'desc');
        } elseif (request('sort') == 'newest') {
            $products->orderBy('created_at', 'desc');
        } elseif (request('sort') == 'oldest') {
            $products->orderBy('created_at');
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
