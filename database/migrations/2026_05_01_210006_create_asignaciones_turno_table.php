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
        Schema::dropIfExists('asignaciones_turno');
        
        Schema::create('asignaciones_turno', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_trabajador')->constrained('trabajadores')->onDelete('cascade');
            $table->foreignId('id_turno')->constrained('turnos')->onDelete('cascade');
            $table->date('fecha');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignaciones_turno');
    }
};
