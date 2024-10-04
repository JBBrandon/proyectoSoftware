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
        Schema::create('reuniones', function (Blueprint $table) {
            $table->id('idReuniones');
            $table->unsignedBigInteger('tutor_id');
            $table->unsignedBigInteger('estudiante_id');
            $table->date('fecha_reunion');
            $table->text('detalles')->nullable();
            $table->string('estado');
            $table->timestamps();
    
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reuniones');
    }
};
