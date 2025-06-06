<div class="product-wrapper">
    <div class="photo">
        <span class="product-image-container">
            <span class="product-image-wrapper">
                <img class="product-image-photo" src="http://fortninecart.test/{{ $cartItem->model->img_path }}" width="120" height="120"></span>
        </span>
    </div>
    <div class="content">
        <div class="product-details">
            <div class="container-info">
                <div class="product-name">
                    <p>{{ $cartItem->model->name }}</p>
                </div>
                <div class="product-description">
                    <p>{{ $cartItem->model->description }}</p>
                </div>
            </div>
            <div class="container-price">
                <div class="price-grid">
                    <div class="wrapper-price">
                        <span class="cart-price">
                            <span class="price">{{ number_format($cartItem->total, 2, '.', ' ') }}$</span>
                        </span>
                    </div>
                    <div class="product-actions action-wrapper">
                        <input class="cart-product-quantity-selector" name="cart-product-quantity-input" type="number"
                               min="1" max="100" size="4" maxlength="3" value="{{ $cartItem->qty }}" title="Quantity" data-cart-item-id="{{ $cartItem->id }}"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
