<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('schedule');

        Schema::create('schedule', function (Blueprint $table) {

            $table->id('schedule_id'); //Primary Key

            $table->unsignedBigInteger('visitor_id');  //Foreign Key

            //Key Relationship
            $table->foreign('visitor_id')
                  ->references('visitor_id')
                  ->on('users')
                  ->onDelete('cascade');

                  
            // $table->string('visitor_fname');
            // $table->string('visitor_lname');

            $table->unsignedBigInteger('contact_id');
            $table->foreign('contact_id')
            ->references('contact_id')
            ->on('contact')
            ->onDelete('cascade');

            $table->unsignedBigInteger('position_id');
            $table->foreign('position_id')
            ->references('position_id')
            ->on('position_table')
            ->onDelete('cascade');

            $table->string('visitor_purpose');
            $table->date('visit_date');
            $table->time('visit_time');

            $table->unsignedBigInteger('schedule_status_id');
            $table->foreign('schedule_status_id')
            ->references('schedule_status_id')
            ->on('schedule_status')
            ->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule');
    }
};
