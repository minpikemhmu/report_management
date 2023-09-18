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
        Schema::create('mr_input_fields', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('merchandiser_report_type_id');
            $table->string('display_name');
            $table->string('identifier');
            $table->integer('display_order');
            $table->string('field_type');
            $table->boolean('isRequired');
            $table->string('list_data', 255)->nullable()->default(null);
            $table->boolean('active_status')->default(0);
            $table->softDeletes(); 
            $table->timestamps();
            $table->foreign('merchandiser_report_type_id')
                    ->references('id')->on('merchandiser_report_types')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mr_input_fields');
    }
};
