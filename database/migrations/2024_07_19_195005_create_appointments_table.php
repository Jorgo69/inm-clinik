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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('reason');
            $table->string('date');
            $table->string('time');
            $table->string('statut')->default('in_progress');
            $table->string('sector')->nullable();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('clinic_id');
            $table->unsignedBigInteger('concerned_id')->nullable();

            $table->foreign('patient_id')->on('users')->references('id')->onDelete('cascade');
            $table->foreign('clinic_id')->on('clinics')->references('id')->onDelete('cascade');
            $table->foreign('concerned_id')->on('users')->references('id')->onDelete('set null');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
