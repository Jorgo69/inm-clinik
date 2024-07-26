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
        Schema::create('complet_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade');
            $table->string('occupation');
            $table->string('country');
            $table->string('city');
            $table->string('tel_number');
            $table->string('card_type')->nullable();
            $table->string('card_number')->nullable();
            $table->string('card_expiration')->nullable();
            $table->string('neighborhood_adress')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('size')->nullable();
            $table->string('weight')->nullable();
            $table->mediumText('allergie')->nullable();
            $table->mediumText('other_medical_infos')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complet_infos');
    }
};
