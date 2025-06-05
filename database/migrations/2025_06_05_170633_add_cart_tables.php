<?php

use App\Models\Cart;
use App\Models\Cart\CartItem;
use App\Models\Model;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable();
            $table->string('customer_session_id');
            $table->integer('items_qty');
            $table->float('subtotal');
            $table->float('tax_total');
            $table->float('shipping_total');
            $table->float('grand_total');
            $table->timestamps();
        });

        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Cart::class);
            $table->foreignIdFor(Model::class);
            $table->integer('qty');
            $table->float('base_price');
            $table->float('total');
            $table->timestamps();
        });

        Cart::create([
            'customer_session_id' => '6841f5a94f426971250468',
            'items_qty' => 3,
            'subtotal' => 2589.89,
            'tax_total' => 387.83,
            'shipping_total' => 0,
            'grand_total' => 2,977.72,
        ]);

        CartItem::create([
            'cart_id' => 1,
            'model_id' => 1,
            'qty' => 1,
            'base_price' => 789.99,
            'total' => 789.99,
        ]);

        CartItem::create([
            'cart_id' => 1,
            'model_id' => 2,
            'qty' => 2,
            'base_price' => 899.95,
            'total' => 1799.90,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
        Schema::dropIfExists('cart_items');
    }
};
