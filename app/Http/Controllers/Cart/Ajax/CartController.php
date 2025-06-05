<?php

namespace App\Http\Controllers\Cart\Ajax;

use App\Models\Cart\CartItem;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CartController
{
    /**
     * Add item to cart item and recalculate cart totals
     * @param Request $request
     * @return Response
     */
    public function updateItemQuantity(Request $request): Response
    {
        try {
            DB::transaction(function() use ($request) {
                /** @var CartItem $cartItem */
                $cartItem = CartItem::where('id', $request->input('cart_item_id'))->firstOrFail();

                if (empty($request->input('qty')) ||
                    (!empty($request->input('qty')) && !(int) ($request->input('qty')))) {
                    throw new \Exception('Incorrect quantity value');
                }

                if (!$cartItem->updateQuantity($request->input('qty'))) {
                    throw new \Exception('Could not update quantity for cart_item_id: '.$request->input('cart_item_id'));
                }
            });

            return response('Quantity updated successfully.', ResponseAlias::HTTP_OK);
        } catch (\Exception $e) {
            return response('Could not update quantity for this item at this moment.', ResponseAlias::HTTP_CONFLICT);
        }
    }
}
