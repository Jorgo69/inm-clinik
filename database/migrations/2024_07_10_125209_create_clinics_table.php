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
        Schema::create('clinics', function (Blueprint $table) {
            $table->id();
            $table->string('clinic_name');
            $table->string('clinic_description');
            $table->string('clinic_geographic_adress');
            $table->string('clinic_logo');
            $table->string('clinic_mail');
            $table->string('clinic_number');

            $table->unsignedBigInteger('adder_id')->nullable();
                $table->foreign('adder_id')
                        ->on('users')
                        ->references('id')
                        ->onDelete('set null');
            $table->string('actived')->default('waiting');
            $table->unsignedBigInteger('validator_id')->nullable();
                $table->foreign('validator_id')
                        ->on('users')
                        ->references('id')
                        ->onDelete('set null');
            
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clinics');
    }
};
