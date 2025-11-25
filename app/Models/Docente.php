<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $fillable = [
        'dni',
        'nombres',
        'apellidos',
        'correo',
        'telefono',
        'foto'
    ];

    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'docente_curso');
    }
}



