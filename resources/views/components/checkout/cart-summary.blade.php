<div class="summary-title">Summary</div>
@if (!empty($cart))
<div class="cell">
    <div class="subtotal summary-total-line">
        <div class="total-name">
            <span>{{ $cart->items_qty }} item{{ $cart->items_qty > 1 ? 's' : '' }}</span>
        </div>
        <div class="amount">
            <span class="price">{{ number_format($cart->subtotal, 2, '.', ' ') }}$</span>
        </div>
    </div>
    <div class="taxes summary-total-line">
        <div class="total-name">
            <span>Estimated Taxes</span>
        </div>
        <div class="amount">
            <span class="price">{{ number_format($cart->tax_total, 2, '.', ' ') }}$</span>
        </div>
    </div>
    <div class="shipping summary-total-line">
        <div class="total-name">
            <span>Estimated Shipping</span>
        </div>
        <div class="amount">
            <span class="price">
                @if ((int) $cart->shipping_total === 0)
                    Free
                @else
                    {{ number_format($cart->shipping_total, 2, '.', ' ') }}$
                @endif
            </span>
        </div>
    </div>
    <hr>
    <div class="total summary-total-line">
        <div class="total-name">
            <strong>Total</strong>
        </div>
        <div class="amount">
            <strong class="price">{{ number_format($cart->grand_total, 2, '.', ' ') }}$</strong>
        </div>
    </div>

    <div class="summary-actions">
        <div class="button-wrapper">
            <a href="/">Proceed to checkout</a>
        </div>
    </div>
</div>
@endif
