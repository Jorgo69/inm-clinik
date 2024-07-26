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
        Schema::create('check_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('complet_name');
            $table->string('country')->default();
            $table->string('city');
            $table->string('neighborhood_adress')->nullable();
            $table->text('files');
            $table->text('tel_number');
            $table->text('email');
            $table->string('actived')->default('waiting');
            
            $table->unsignedBigInteger('asker_id');
            $table->foreign('asker_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('check_accounts');
    }
};
