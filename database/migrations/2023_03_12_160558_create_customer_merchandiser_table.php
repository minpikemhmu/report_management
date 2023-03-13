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
        Schema::create('customer_merchandiser', function (Blueprint $table) {
            $table->id();
            $table->foreignId('merchandiser_id')
            ->nullable()
            ->on('merchandisers')
            ->cascadeOnDelete();
            $table->foreignId('customer_id')
            ->nullable()
            ->on('customers')
            ->cascadeOnDelete();
            $table->date('assign_date');
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
        Schema::dropIfExists('merchandiser_customer');
    }
};
