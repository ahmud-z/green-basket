<?php

namespace App\Http\Controllers;

class CheckoutController extends Controller
{
    public function shipping()
    {
        return view('pages.checkout.shipping');
    }

    public function saveShipping()
    {

    }

    public function payment()
    {
        return view('pages.checkout.payment');
    }

    public function collectPayment()
    {

    }

    public function confirmation()
    {
        return view('pages.checkout.confirmation');
    }
}
