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
            $table->id();
            $table->string('idPlanes');
            $table->string('titulo');
            $table->text('descripcion');
            $table->string('estado');
            $table->foreignId('tutor_id')->constrained('tutores')->onDelete('cascade'); // Esto genera una columna bigint(20) unsigned
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
