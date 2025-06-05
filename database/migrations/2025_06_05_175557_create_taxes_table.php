<?php

use App\Models\Taxes;
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
        Schema::create('taxes', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->char('country_code', 2)->nullable(false);
            $table->char('region_code', 2)->nullable();
            $table->decimal('rate', 4);
            $table->timestamps();
        });

        Taxes::create([
            'code' => 'GST',
            'rate' => 0.05,
            'country_code' => 'CA',
        ]);

        Taxes::create([
            'code' => 'QST',
            'rate' => 0.09975,
            'country_code' => 'CA',
            'region_code' => 'QC',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taxes');
    }
};
