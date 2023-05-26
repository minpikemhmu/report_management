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
        Schema::create('ba_assigns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ba_staff_id')->constrained('ba_staffs');
            $table->foreignId('product_key_category_id')->constrained('product_key_categories');
            $table->string('target_quantity');
            $table->unsignedTinyInteger('month');
            $table->unsignedSmallInteger('year');
            $table->softDeletes();
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
        Schema::dropIfExists('ba_assigns');
    }
};
