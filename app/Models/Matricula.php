<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $fillable = [
        'alumno_id',
        'nivel_id',
        'grado_id',
        'seccion_id',
        'anio_academico',
        'estado'
    ];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }

    public function nivel()
    {
        return $this->belongsTo(Nivel::class);
    }

    public function grado()
    {
        return $this->belongsTo(Grado::class);
    }

    public function seccion()
    {
        return $this->belongsTo(Seccion::class);
    }
}

