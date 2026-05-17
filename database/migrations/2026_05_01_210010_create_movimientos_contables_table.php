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
        Schema::dropIfExists('movimientos_contables');
        
        Schema::create('movimientos_contables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pedido')->nullable()->constrained('pedidos')->onDelete('restrict');
            $table->decimal('monto', 10, 2);
            $table->enum('tipo', ['ingreso', 'egreso']);
            $table->date('fecha');
            $table->string('descripcion', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimientos_contables');
    }
};
