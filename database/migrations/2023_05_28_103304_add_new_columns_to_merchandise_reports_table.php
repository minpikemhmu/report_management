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
        Schema::table('merchandise_reports', function (Blueprint $table) {
            $table->string('actual_latitude')->nullable()->after('longitude');
            $table->string('actual_longitude')->nullable()->after('actual_latitude');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('merchandise_reports', function (Blueprint $table) {
            $table->dropColumn('actual_latitude');
            $table->dropColumn('actual_longitude');
        });
    }
};
