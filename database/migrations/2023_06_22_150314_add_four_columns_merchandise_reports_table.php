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
            $table->boolean('planogram')->nullable()->after('actual_longitude');
            $table->boolean('hygiene')->nullable()->after('planogram');
            $table->boolean('sale_team_visit')->nullable()->after('hygiene');
            $table->string('outlet_status')->nullable()->after('sale_team_visit');
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
            $table->dropColumn('planogram');
            $table->dropColumn('hygiene');
            $table->dropColumn('sale_team_visit');
            $table->dropColumn('outlet_status');
        });
    }
};
