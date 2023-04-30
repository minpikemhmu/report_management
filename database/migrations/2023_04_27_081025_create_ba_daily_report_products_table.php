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
        Schema::create('ba_daily_report_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ba_daily_report_id')->on('ba_daily_reports')->cascadeOnDelete();
            $table->foreignId('product_id')->on('products')->cascadeOnDelete();
            $table->string('count');
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
        Schema::dropIfExists('ba_daily_report_products');
    }
};
