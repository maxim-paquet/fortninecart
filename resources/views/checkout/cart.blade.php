<x-layout>
    <div id="main-content">
        <div class="cart-wrapper">
            <div class="inner-cart-wrapper">
                <div class="cart-container">
                    <div class="cart-items-container">
                        <div class="cart-title">Shopping Cart</div>
                        <div class="product-container">
                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                            @if (empty($cart->cartItems))
                                <div>Your cart is empty!</div>
                            @else
                                @foreach($cart->cartItems as $cartItem)
                                    <x-checkout.cart-item-card :$cartItem />
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="summary-container">
                        <x-checkout.cart-summary :$cart />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
