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
            $table->string('field_21')->nullable()->after('field_20');
            $table->string('field_22')->nullable()->after('field_21');
            $table->string('field_23')->nullable()->after('field_22');
            $table->string('field_24')->nullable()->after('field_23');
            $table->string('field_25')->nullable()->after('field_24');
            $table->string('field_26')->nullable()->after('field_25');
            $table->string('field_27')->nullable()->after('field_26');
            $table->string('field_28')->nullable()->after('field_27');
            $table->string('field_29')->nullable()->after('field_28');
            $table->string('field_30')->nullable()->after('field_29');
            $table->string('field_31')->nullable()->after('field_30');
            $table->string('field_32')->nullable()->after('field_31');
            $table->string('field_33')->nullable()->after('field_32');
            $table->string('field_34')->nullable()->after('field_33');
            $table->string('field_35')->nullable()->after('field_34');
            $table->string('field_36')->nullable()->after('field_35');
            $table->string('field_37')->nullable()->after('field_36');
            $table->string('field_38')->nullable()->after('field_37');
            $table->string('field_39')->nullable()->after('field_38');
            $table->string('field_40')->nullable()->after('field_39');
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
            //
        });
    }
};
