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
        Schema::create('user_video', function (Blueprint $table) {
            $table->id();
            $table->foreignId('merchandiser_id')->on('merchandisers')->cascadeOnDelete()->nullable();
            $table->foreignId('mr_supervisor_id')->on('mr_supervisors')->cascadeOnDelete()->nullable();
            $table->foreignId('mr_executive_id')->on('mr_executives')->cascadeOnDelete()->nullable();
            $table->foreignId('bastaff_id')->on('ba_staffs')->cascadeOnDelete()->nullable();
            $table->foreignId('ba_supervisor_id')->on('supervisors')->cascadeOnDelete()->nullable();
            $table->foreignId('ba_executive_id')->on('ba_executives')->cascadeOnDelete()->nullable();
            $table->foreignId('video_id')->on('videos')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_video');
    }
};
