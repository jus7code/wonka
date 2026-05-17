<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    use HasFactory;

    protected $table = 'trabajadores';

    protected $fillable = ['user_id', 'nombre', 'apellido', 'cargo', 'salario', 'id_linea_produccion', 'estado'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lineaProduccion()
    {
        return $this->belongsTo(LineaProduccion::class, 'id_linea_produccion');
    }

    public function asignacionesTurno()
    {
        return $this->hasMany(AsignacionTurno::class, 'id_trabajador');
    }

    public function solicitudesTurno()
    {
        return $this->hasMany(SolicitudTurno::class, 'id_trabajador');
    }
}
