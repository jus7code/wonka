<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignacionTurno extends Model
{
    use HasFactory;

    protected $table = 'asignaciones_turno';

    protected $fillable = ['id_trabajador', 'id_turno', 'fecha'];

    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class, 'id_trabajador');
    }

    public function turno()
    {
        return $this->belongsTo(Turno::class, 'id_turno');
    }
}
