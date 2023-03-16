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
        Schema::table('ba_staffs', function (Blueprint $table) {
            $table->string('password')->after('subchennel_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('ba_staffs', 'password')) {
            Schema::table('ba_staffs', function (Blueprint $table) {
                $table->dropColumn('password');
            });
        }
    }
};
