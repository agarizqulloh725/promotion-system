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
        Schema::create('product_color', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('color_id')->nullable();
            $table->unsignedBigInteger('branch_product_id')->nullable();
            $table->unsignedBigInteger('product_specification_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->timestamps();

            // $table->foreign('branch_product_id')->references('id')->on('branch_product')->onDelete('cascade');
            // $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
            // $table->foreign('color_id')->references('id')->on('color')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_color');
    }
};
