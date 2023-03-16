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
            $table->string('password')->after('mer_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('merchandisers', 'password')) {
            Schema::table('merchandisers', function (Blueprint $table) {
                $table->dropColumn('password');
            });
        }
    }
};
