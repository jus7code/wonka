<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    use HasFactory;

    protected $table = 'lotes';

    protected $fillable = ['id_producto', 'id_linea_produccion', 'cantidad', 'estado', 'fecha_ingreso', 'qr_code'];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }

    public function lineaProduccion()
    {
        return $this->belongsTo(LineaProduccion::class, 'id_linea_produccion');
    }
}
