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
        Schema::create('merchandisers', function (Blueprint $table) {
            $table->id();
            $table->string('mer_code');
            $table->string('name');
            $table->foreignId('region_id')
            ->nullable()
            ->on('regions')
            ->cascadeOnDelete();
            $table->foreignId('merchant_team_id')
            ->nullable()
            ->on('merchant_teams')
            ->cascadeOnDelete();
            $table->foreignId('merchant_area_id')
            ->nullable()
            ->on('merchant_areas')
            ->cascadeOnDelete();
            $table->foreignId('channel_id')
            ->nullable()
            ->on('channels')
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
        Schema::dropIfExists('merchandisers');
    }
};
