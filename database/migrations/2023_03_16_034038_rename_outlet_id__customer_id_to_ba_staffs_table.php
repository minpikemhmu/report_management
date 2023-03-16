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
        if(Schema::hasColumn('ba_staffs', 'outlet_id')) {
            Schema::table('ba_staffs', function (Blueprint $table) {
                    $table->renameColumn('outlet_id', 'customer_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ba_staffs', function (Blueprint $table) {
            //
        });
    }
};
