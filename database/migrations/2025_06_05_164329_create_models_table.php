<?php

use App\Models\Model;
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
        Schema::create('models', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('img_path');
            $table->timestamps();
        });

        Model::create([
            'name' => 'AGV K6 S Solid Helmet',
            'description' => 'Color: Matte Black',
            'img_path' => 'images/product_images/helmet_1.jpg',
        ]);
        Model::create([
            'name' => 'Shoei RF-1400 Solid Helmet',
            'description' => 'Color: Yellow',
            'img_path' => 'images/product_images/helmet_2.jpg',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('models');
    }
};
