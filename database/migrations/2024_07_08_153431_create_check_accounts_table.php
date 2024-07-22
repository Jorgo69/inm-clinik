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
            $table->string('matricule');
            $table->string('adresse');
            $table->text('files');
            $table->text('number');
            $table->text('email');
            $table->unsignedBigInteger('asker_id');
            $table->foreign('asker_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            $table->string('actived')->default('waiting');
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
