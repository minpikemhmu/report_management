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
        Schema::create('ba_daily_reports', function (Blueprint $table) {
            $table->id();
            $table->date('ba_report_date');
            $table->foreignId('bastaff_id')->constrained('ba_staffs');
            $table->foreignId('outlet_id')->constrained();
            $table->foreignId('ba_report_type_id')->constrained();
            $table->json('products')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ba_daily_reports');
    }
};
