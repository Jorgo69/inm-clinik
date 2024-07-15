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
        Schema::create('request_to_become_clinic_members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('asker_id');
                $table->foreign('asker_id')
                        ->references('id')
                        ->on('users')
                        ->onDelete('cascade');
            $table->unsignedBigInteger('clinic_id');
                $table->foreign('clinic_id')
                        ->references('id')
                        ->on('clinics')
                        ->onDelete('cascade');
            $table->string('statut')->default('waiting');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_to_become_clinic_members');
    }
};
