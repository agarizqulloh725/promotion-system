<?php

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
        Schema::create('product_promo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->string('name')->nullable();
            $table->decimal('discount', 8, 2)->nullable();
            $table->decimal('cashback', 8, 2)->nullable();
            $table->decimal('bonus', 8, 2)->nullable();
            $table->string('promo_front')->nullable();
            $table->string('promo_start')->nullable();
            $table->string('promo_end')->nullable();
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('product')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_promo');
    }
};
