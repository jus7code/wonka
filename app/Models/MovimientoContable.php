<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimientoContable extends Model
{
    use HasFactory;

    protected $table = 'movimientos_contables';

    protected $fillable = [
        'id_pedido',
        'monto',
        'tipo',
        'fecha',
        'descripcion',
    ];

    /**
     * Relationship with Pedido.
     */
    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'id_pedido');
    }
}
