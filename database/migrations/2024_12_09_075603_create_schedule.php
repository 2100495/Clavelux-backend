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

            $table->unsignedBigInteger('user_id');  //Foreign Key

            //Key Relationship
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

                  
            $table->string('visitor_fname');
            $table->string('visitor_lname');
            $table->string('host_email');
            $table->string('host_status');
            $table->string('visitor_purpose');
            $table->date('visit_date');
            $table->time('visit_time');
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
