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
        Schema::create('ba_staffs', function (Blueprint $table) {
            $table->id();
            $table->string('ba_code');
            $table->string('name');
            $table->foreignId('division_state_id')
            ->nullable()
            ->on('division_states')
            ->cascadeOnDelete();
            $table->foreignId('supervisor_id')
            ->nullable()
            ->on('supervisors')
            ->cascadeOnDelete();
            $table->foreignId('city_id')
            ->nullable()
            ->on('cities')
            ->cascadeOnDelete();
            $table->foreignId('outlet_id')
            ->nullable()
            ->on('outlets')
            ->cascadeOnDelete();
            $table->foreignId('channel_id')
            ->nullable()
            ->on('channels')
            ->cascadeOnDelete();
            $table->foreignId('subchennel_id')
            ->nullable()
            ->on('subchannels')
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
        Schema::dropIfExists('ba_staffs');
    }
};
