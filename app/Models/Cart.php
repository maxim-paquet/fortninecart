<?php

namespace App\Models;

use App\Models\Cart\CartItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'customer_id',
        'customer_session_id',
        'items_qty',
        'subtotal',
        'tax_total',
        'shipping_total',
        'grand_total'
    ];

    /**
     * Will return null if user is guest (will always be the case at the moment)
     * @return BelongsTo|null
     */
    public function user(): ?BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasMany|null
     */
    public function cartItems(): ?HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    /**
     * @return bool
     */
    public function calculateAndSaveTotals(): bool
    {
        $itemTotal = $this->getItemTotal();
        $shippingTotal = $this->getShippingTotal();
        $taxTotal = $this->getTaxTotal($itemTotal, $shippingTotal);

        return $this->update([
            'items_qty' => $this->getItemsTotalQty(),
            'subtotal' => $itemTotal,
            'shipping_total' => $shippingTotal,
            'tax_total' => $taxTotal,
            'grand_total' => $itemTotal + $shippingTotal + $shippingTotal,
        ]);
    }

    /**
     * @return float
     */
    private function getItemTotal(): float
    {
        $itemTotal = 0;
        $this->fresh();
        if (!empty($this->cartItems())) {
            $this->cartItems()->each(function ($cartItem) use (&$itemTotal) {
                $itemTotal += $cartItem->total;
            });
        }
        return (float) $itemTotal;
    }

    /**
     * @return int
     */
    private function getItemsTotalQty(): int
    {
        $totalQty = 0;
        if (!empty($this->cartItems())) {
            $this->cartItems()->each(function ($cartItem) use (&$totalQty) {
                $totalQty += $cartItem->qty;
            });
        }
        return $totalQty;
    }

    /**
     * @param float $itemTotal
     * @param float $shippingTotal
     * @return float
     */
    private function getTaxTotal(float $itemTotal, float $shippingTotal): float
    {
        $taxTotal = 0;
        $applicableTaxes = $this->getApplicableTaxes();
        if (!empty($applicableTaxes)) {
            foreach ($applicableTaxes as $applicableTax) {
                $taxTotal += round(($itemTotal + $shippingTotal) * $applicableTax->rate, 4);
            }
        }
        return (float) $taxTotal;
    }

    /**
     * Always free shipping as per requirements
     * @return float
     */
    private function getShippingTotal(): float
    {
        $shippingTotal = 0;
        return (float) $shippingTotal;
    }

    /**
     * As per requirements, it is implied that the user is from Canada/Quebec, so {0.05, 0.0975}
     * @return array
     */
    private function getApplicableTaxes(): array
    {
        return Taxes::getTaxRatesForCountryAndRegion('CA', 'QC');
    }
}
