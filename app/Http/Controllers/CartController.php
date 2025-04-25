<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('pages.cart.index');
    }

    public function store(Request $request)
    {
        session()->put('cart', $request->items);

        return response()->noContent();
    }

    public function addItem($productId)
    {
        $product = Product::findOrFail($productId);

        $cart = session()->get('cart');

        if (! $cart) {
            $cart = [
                $productId => [
                    'name' => $product->name,
                    'quantity' => 1,
                    'price' => $product->price,
                    'image_path' => $product->image_path,
                ],
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        $cart[$productId] = [
            'name' => $product->name,
            'quantity' => 1,
            'price' => $product->price,
            'image_path' => $product->image_path,
        ];

        session()->put('cart', $cart);

        if (request()->wantsJson()) {
            return response()->json(['message' => 'Product added to cart successfully!']);
        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function removeItem(Request $request)
    {
        if ($request->productId) {
            $cart = session()->get('cart');

            if (isset($cart[$request->productId])) {

                unset($cart[$request->productId]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }

    public function clearCart()
    {
        session()->forget('cart');

        return redirect()->back();
    }
}
