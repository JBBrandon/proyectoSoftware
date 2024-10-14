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
        Schema::create('planes', function (Blueprint $table) {
            $table->id(); // Esto crea un BIGINT UNSIGNED
            $table->string('idPlanes');
            $table->string('titulo');
            $table->text('descripcion');
            $table->string('estado');
            $table->foreignId('tutor_id')->constrained('tutores')->onDelete('cascade'); // Asegúrate de que tutor_id es BIGINT UNSIGNED
            $table->timestamps();
        });
        
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planes');
    }
};
