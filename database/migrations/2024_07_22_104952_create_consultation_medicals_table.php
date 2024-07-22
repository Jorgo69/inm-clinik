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
        Schema::create('consultation_medicals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('clinic_id')->nullable();
            $table->unsignedBigInteger('concerned_id')->nullable();

            $table->softDeletes();

            $table->foreign('patient_id')->on('users')->references('id')->onDelete('cascade');
            $table->foreign('clinic_id')->on('clinics')->references('id')->onDelete('set null');
            $table->foreign('concerned_id')->on('users')->references('id')->onDelete('set null');

            $table->longText('consultation');
            $table->longText('prescription_medical')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultation_medicals');
    }
};
