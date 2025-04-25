<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function shipping()
    {
        return view('pages.checkout.shipping');
    }

    public function saveShipping(Request $request)
    {
        session()->put('checkout', [
            'shipping' => $request->except('_token'),
        ]);

        return redirect()->route('checkout.payment');
    }

    public function payment()
    {
        return view('pages.checkout.payment');
    }

    public function collectPaymentAndCreateOrder(Request $request)
    {
        $cartProducts = json_decode(json_encode((object) session()->get('cart', [])), false);

        $shipping = session('checkout')['shipping'];

        $order = Auth::user()->orders()->create([
            'email' => $shipping['email'],
            'phone' => $shipping['phone'],
            'name' => trim(implode(' ', [$shipping['first_name'], $shipping['last_name']])),
            'address' => $shipping['address'],
            'city' => $shipping['city'],
            'state' => $shipping['state'],
            'zip' => $shipping['zip'],
            'country' => $shipping['country'],
            'shipping_method' => $shipping['shipping_method'],
            'instructions' => $shipping['instructions'],
        ]);

        foreach ($cartProducts as $product) {
            $order->items()->create([
                'product_id' => $product->id,
                'price' => $product->price,
                'quantity' => $product->quantity,
            ]);
        }

        session()->forget('cart');
        session()->forget('checkout');

        return redirect()->route('checkout.confirmation', ['orderId' => $order->id]);
    }

    public function confirmation($orderId)
    {
        $order = Order::findOrFail($orderId);

        return view('pages.checkout.confirmation', compact('order'));
    }
}
