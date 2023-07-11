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
        Schema::table('ba_daily_report_products', function (Blueprint $table) {
            $table->string('price')->after('count');
            $table->date('manufacture_date')->nullable()->after('price');
            $table->date('expiry_date')->nullable()->after('manufacture_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ba_daily_report_products', function (Blueprint $table) {
            $table->dropColumn('price');
            $table->dropColumn('manufacture_date');
            $table->dropColumn('expiry_date');
        });
    }
};
