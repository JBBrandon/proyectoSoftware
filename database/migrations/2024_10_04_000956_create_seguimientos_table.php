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
        Schema::create('seguimientos', function (Blueprint $table) {

            $table->id();
            $table->string('idSeguimientos');
            $table->unsignedBigInteger('tutor_id');
            $table->unsignedBigInteger('estudiante_id');
            $table->text('informe')->nullable();
            $table->string('progreso');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguimientos');
    }
};
