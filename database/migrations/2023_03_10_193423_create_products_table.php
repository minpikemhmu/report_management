<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('product_code');
            $table->string('brn_code');
            $table->foreignId('product_brands_id')->on('product_brands')->cascadeOnDelete();
            $table->foreignId('product_category_id')->on('product_categories')->cascadeOnDelete();
            $table->foreignId('product_sub_category_id')->on('product_sub_categories')->cascadeOnDelete();
            $table->string('size');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
