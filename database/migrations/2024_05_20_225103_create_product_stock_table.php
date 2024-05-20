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
        Schema::create('product_stock', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_specification_id')->nullable();
            $table->unsignedBigInteger('product_color_id')->nullable();
            $table->unsignedBigInteger('product_size_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->integer('stock')->nullable();
            $table->timestamps();

            $table->foreign('product_specification_id')->references('id')->on('product_specification')->onDelete('no action');
            $table->foreign('product_color_id')->references('id')->on('product_color')->onDelete('no action');
            $table->foreign('product_size_id')->references('id')->on('product_size')->onDelete('no action');
            $table->foreign('product_id')->references('id')->on('product')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_stock');
    }
};
