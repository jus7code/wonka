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
        // 1. Update 'trabajadores' table
        Schema::table('trabajadores', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade')->after('id');
            $table->decimal('salario', 10, 2)->default(0.00)->after('cargo');
            $table->foreignId('id_linea_produccion')->nullable()->constrained('lineas_produccion')->onDelete('set null')->after('salario');
        });

        // 2. Create 'solicitudes_turno' table
        Schema::create('solicitudes_turno', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_trabajador')->constrained('trabajadores')->onDelete('cascade');
            $table->enum('tipo', ['cambio', 'cancelacion']);
            $table->foreignId('id_turno_deseado')->nullable()->constrained('turnos')->onDelete('cascade');
            $table->date('fecha_deseada');
            $table->text('motivo')->nullable();
            $table->enum('estado', ['pendiente', 'aprobado', 'rechazado'])->default('pendiente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitudes_turno');

        Schema::table('trabajadores', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['id_linea_produccion']);
            $table->dropColumn(['user_id', 'salario', 'id_linea_produccion']);
        });
    }
};
