<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineaProduccion extends Model
{
    use HasFactory;

    protected $table = 'lineas_produccion';

    protected $fillable = ['nombre', 'descripcion'];

    public function lotes()
    {
        return $this->hasMany(Lote::class, 'id_linea_produccion');
    }
}
