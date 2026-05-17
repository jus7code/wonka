<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    protected $table = 'detalles_pedido';

    protected $fillable = [
        'id_pedido',
        'id_lote',
        'cantidad',
        'precio_unitario'
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'id_pedido');
    }

    public function lote()
    {
        return $this->belongsTo(Lote::class, 'id_lote');
    }
}
