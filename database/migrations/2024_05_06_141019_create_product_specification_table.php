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
        Schema::create('product_specification', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('specification_id')->nullable();
            $table->string('name')->nullable();
            $table->decimal('harga', 15, 2)->nullable();
            $table->text('description')->nullable(); 
            $table->timestamps();

            $table->foreign('specification_id')->references('id')->on('specification')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_specification');
    }
};
