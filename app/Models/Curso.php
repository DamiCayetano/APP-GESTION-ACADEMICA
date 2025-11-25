<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = [
        'nombre',
        'area',
        'nivel_id',
        'grado_id',
        'horas_semanales',
        'estado'
    ];

    public function nivel()
    {
        return $this->belongsTo(Nivel::class);
    }

    public function grado()
    {
        return $this->belongsTo(Grado::class);
    }

    public function docentes()
    {
        return $this->belongsToMany(Docente::class, 'docente_curso');
    }
}


