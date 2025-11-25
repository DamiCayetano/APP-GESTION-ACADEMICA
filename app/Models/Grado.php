<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    protected $fillable = ['nombre', 'nivel_id'];

    public function nivel()
    {
        return $this->belongsTo(Nivel::class);
    }

    public function secciones()
    {
        return $this->hasMany(Seccion::class);
    }

    public function cursos()
    {
        return $this->hasMany(Curso::class);
    }
}
