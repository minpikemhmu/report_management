<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->boolean('is_attendance')->default(false)->after('is_check_out');
        });

        // Update existing records
        DB::table('merchandiser_attendances')
            ->where('is_check_in', true)
            ->where('is_check_out', true)
            ->update(['is_attendance' => true]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('merchandiser_attendances', function (Blueprint $table) {
            $table->dropColumn('is_attendance');
        });
    }
};
