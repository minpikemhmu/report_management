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
        Schema::table('merchandisers', function (Blueprint $table) {
            $table->foreignId('leader_id')->on('mr_leaders')->cascadeOnDelete()->nullable()->after('channel_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('merchandisers', function (Blueprint $table) {
            $table->foreignId('leader_id')->on('mr_leaders')->cascadeOnDelete()->nullable()->after('channel_id');
        });
    }
};
