<?php

use App\Http\Controllers\Cart\Ajax\CartController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/checkout/cart');

Route::get('/checkout/cart', [CheckoutController::class, 'cart']);

Route::post('/ajax/cart/item/update-qty', [CartController::class, 'updateItemQuantity']);
