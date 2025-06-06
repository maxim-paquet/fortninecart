<?php

namespace App\Http\Controllers;

use App\Models\Cart;

class CheckoutController extends Controller
{
    public function cart()
    {
        //The cart is forced as per requirements
        $cart = Cart::where('customer_session_id', '6841f5a94f426971250468')->with('cartItems')->first();

        return view('checkout/cart', ['cart' => $cart]);
    }
}
