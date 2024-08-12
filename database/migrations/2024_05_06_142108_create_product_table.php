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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->string('name')->nullable();
            $table->string('year')->nullable();
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->string('link_video')->nullable();
            $table->string('link_tokopedia')->nullable();
            $table->boolean('is_show')->nullable();
            $table->boolean('is_popular')->nullable();
            $table->string('ram')->nullable();
            $table->string('storage')->nullable();
            $table->string('cpu')->nullable();
            $table->string('display')->nullable();
            $table->string('kamera')->nullable();
            $table->string('battery')->nullable();
            $table->string('spec_array')->nullable();
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('brand')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
