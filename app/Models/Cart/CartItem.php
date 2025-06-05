<?php

namespace App\Models\Cart;

use App\Models\Cart;
use App\Models\Model as ProductModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'cart_id',
        'model_id',
        'qty',
        'base_price',
        'total'
    ];

    /**
     * @return BelongsTo
     */
    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    /**
     * @return BelongsTo
     */
    public function model(): BelongsTo
    {
        return $this->belongsTo(ProductModel::class);
    }

    /**
     * @param int $newQty
     * @return bool
     */
    public function updateQuantity(int $newQty): bool
    {
        $saved = $this->update([
            'qty' => $newQty,
            'total' => $this->base_price * $newQty,
        ]);

        if (!$saved) {
            return false;
        }

        return $this->cart->calculateAndSaveTotals();
    }
}
