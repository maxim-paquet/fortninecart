<?php

namespace App\Http\Controllers;

class CheckoutController extends Controller
{
    public function cart()
    {
        return view('checkout/cart');
    }
}
