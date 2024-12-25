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
        Schema::create('contact', function (Blueprint $table) {
            $table->id("contact_id");
            $table->string("email");
            $table->string("password");
            $table->string("fname");
            $table->string("lname");
            
            $table->unsignedBigInteger('position_id');
            $table->foreign('position_id')
            ->references('position_id')
            ->on('position_table')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('host_models');
    }
};
