<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudTurno extends Model
{
    use HasFactory;

    protected $table = 'solicitudes_turno';

    protected $fillable = ['id_trabajador', 'tipo', 'id_turno_deseado', 'fecha_deseada', 'motivo', 'estado'];

    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class, 'id_trabajador');
    }

    public function turnoDeseado()
    {
        return $this->belongsTo(Turno::class, 'id_turno_deseado');
    }
}
