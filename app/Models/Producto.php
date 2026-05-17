<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = ['id_categoria', 'nombre', 'precio_unitario', 'unidad_medida', 'tipo_empaque', 'imagen', 'descripcion'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function lotes()
    {
        return $this->hasMany(Lote::class, 'id_producto');
    }
}
