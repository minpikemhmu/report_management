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
            // Remove unnecessary columns
            $table->dropColumn(['gondolar_type_id', 'trip_type_id', 'outskirt_type_id']);
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
            // Add back the columns in reverse order
            $table->integer('outstrik_type_id')->nullable();
            $table->integer('trip_type_id')->nullable();
            $table->integer('gondolar_type_id')->nullable();
        });
    }
};
