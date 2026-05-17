<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';

    protected $fillable = [
        'id_cliente',
        'fecha',
        'tipo',
        'total',
        'estado'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function detalles()
    {
        return $this->hasMany(DetallePedido::class, 'id_pedido');
    }

    public function movimientosContables()
    {
        return $this->hasMany(MovimientoContable::class, 'id_pedido');
    }
}
