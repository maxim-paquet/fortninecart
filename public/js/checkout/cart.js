document.addEventListener('readystatechange', () => {
    if (document.readyState !== 'complete') {
        return;
    }

    $('.cart-product-quantity-selector').on('change', function() {
        $.ajax('/ajax/cart/item/update-qty', {
            type: 'POST',
            data: {
                _token: $('#token').val(),
                cart_item_id: $(this).data('cart-item-id'),
                qty: $(this).val()
            },
            success: function(data) {
                $('<div />').html(data).dialog({
                    title: 'Quantity update',
                    modal: true,
                    close: function() {
                        location.reload();
                    }
                });
            },
            error: function(data) {
                alert(data.responseText);
            }
        }).done(function(response) {
            console.log('done');
            console.log(response);
        });
    });
});
