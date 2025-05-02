<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store($productId, Request $request)
    {
        $request->validate([
            'name' => 'required|string|nullable',
            'email' => 'string|nullable',
            'rating' => 'required|numeric|between:1,5',
            'comment' => 'required|string',
        ]);

        $product = Product::findOrFail($productId);

        return $product->reviews()->create([
            'reviewer_name' => $request->name,
            'reviewer_email' => $request->email,
            'content' => $request->comment,
            'rating' => $request->rating,
        ]);
    }
}
