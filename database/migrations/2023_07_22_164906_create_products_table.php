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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->string('name');
            $table->longText('description');
            $table->integer('price');
            $table->float('discount');
            $table->enum('size', ['S', 'M', 'L', 'XL', 'XXL', '3XL', '4XL']);

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('category_id')
                    ->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
