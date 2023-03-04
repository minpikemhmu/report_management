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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('dksh_customer_id');
            $table->text('address');
            $table->string('phone_number');
            $table->foreignId('division_state_id')
            ->nullable()
            ->on('division_states')
            ->cascadeOnDelete();
            $table->foreignId('region_id')
            ->nullable()
            ->on('regions')
            ->cascadeOnDelete();
            $table->foreignId('township_id')
            ->nullable()
            ->on('townships')
            ->cascadeOnDelete();
            $table->foreignId('city_id')
            ->nullable()
            ->on('cities')
            ->cascadeOnDelete();
            $table->foreignId('customer_type_id')
            ->nullable()
            ->on('customer_types')
            ->cascadeOnDelete();
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
        Schema::dropIfExists('customers');
    }
};
