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
        Schema::table('merchandiser_attendances', function (Blueprint $table) {
            $table->string('check_in_latitude')->after('check_out_time')->nullable();
            $table->string('check_in_longitude')->after('check_in_latitude')->nullable();
            $table->string('check_out_latitude')->after('check_in_longitude')->nullable();
            $table->string('check_out_longitude')->after('check_out_latitude')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('merchandiser_attendances', function (Blueprint $table) {
            //
        });
    }
};
