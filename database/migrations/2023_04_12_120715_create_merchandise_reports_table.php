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
        Schema::create('merchandise_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('merchandiser_id')
            ->on('merchandisers')
            ->cascadeOnDelete();
            $table->foreignId('customer_id')
            ->on('customers')
            ->cascadeOnDelete();
            $table->foreignId('gondolar_type_id')
            ->on('gondolar_types')
            ->cascadeOnDelete();
            $table->foreignId('trip_type_id')
            ->on('trip_types')
            ->cascadeOnDelete();
            $table->foreignId('outskirt_type_id')
            ->on('outskirt_types')
            ->cascadeOnDelete();
            $table->integer('qty')->nullable();
            $table->string('gondolar_size_inches_length')->nullable();
            $table->string('gondolar_size_inches_weight')->nullable();
            $table->string('gondolar_size_centimeters_length')->nullable();
            $table->string('gondolar_size_centimeters_weight')->nullable();
            $table->string('backlit_size_inches_length')->nullable();
            $table->string('backlit_size_inches_weight')->nullable();
            $table->string('backlit_size_centimeters_length')->nullable();
            $table->string('backlit_size_centimeters_weight')->nullable();
            $table->text('outlet_photo_before')->nullable();
            $table->text('outlet_photo_after')->nullable();
            $table->string('remark')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchandise_reports');
    }
};
