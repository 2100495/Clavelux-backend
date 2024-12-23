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
        Schema::dropIfExists('notification');
        Schema::create('notification', function (Blueprint $table) {
           
            $table->id('notification_id'); // Primary Key

            $table->unsignedBigInteger('user_id'); // Foreign Key
            $table->foreign('user_id') // Relational Key
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->unsignedBigInteger('schedule_id'); // Foreign Key
            $table->foreign('schedule_id') // Relational Key
                  ->references('schedule_id')
                  ->on('schedule')
                  ->onDelete('cascade');

            $table->string('status');
            $table->date('date');
            $table->time('time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notification');
    }
};
