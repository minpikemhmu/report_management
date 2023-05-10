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
        Schema::create('merchandiser_attendances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('staff_id');
            $table->boolean('is_check_in')->default(false);
            $table->boolean('is_check_out')->default(false);
            $table->dateTime('check_in_time')->nullable()->unique();
            $table->dateTime('check_out_time')->nullable()->unique();
            $table->timestamps();
            $table->softDeletes();
            
            $table->unique(['staff_id', 'check_in_time']);
            // Indexes
            $table->index('staff_id');
            $table->index('check_in_time');
            $table->index('check_out_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchandiser_attendances');
    }
};
