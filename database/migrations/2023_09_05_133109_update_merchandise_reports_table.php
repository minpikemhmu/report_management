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
            $table->dropColumn(['qty', 'gondolar_size_inches_length', 'gondolar_size_inches_weight', 'gondolar_size_centimeters_length', 'gondolar_size_centimeters_weight', 'backlit_size_inches_length', 'backlit_size_inches_weight',
            'backlit_size_centimeters_length','backlit_size_centimeters_weight', 'outlet_photo_before', 'outlet_photo_after' ,'remark', 'planogram', 'hygiene', 'sale_team_visit', 'outlet_status']);
    
            // Add new columns
            $table->string('field_1')->nullable()->after('merchandiser_report_type_id');
            $table->string('field_2')->nullable()->after('field_1');
            $table->string('field_3')->nullable()->after('field_2');
            $table->string('field_4')->nullable()->after('field_3');
            $table->string('field_5')->nullable()->after('field_4');
            $table->string('field_6')->nullable()->after('field_5');
            $table->string('field_7')->nullable()->after('field_6');
            $table->string('field_8')->nullable()->after('field_7');
            $table->string('field_9')->nullable()->after('field_8');
            $table->string('field_10')->nullable()->after('field_9');
            $table->string('field_11')->nullable()->after('field_10');
            $table->string('field_12')->nullable()->after('field_11');
            $table->string('field_13')->nullable()->after('field_12');
            $table->string('field_14')->nullable()->after('field_13');
            $table->string('field_15')->nullable()->after('field_14');
            $table->string('field_16')->nullable()->after('field_15');
            $table->string('field_17')->nullable()->after('field_16');
            $table->string('field_18')->nullable()->after('field_17');
            $table->string('field_19')->nullable()->after('field_18');
            $table->string('field_20')->nullable()->after('field_19');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
