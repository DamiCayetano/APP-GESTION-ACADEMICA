<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    protected $table = 'niveles'; // <- aquí le dices a Laravel la tabla correcta
    protected $fillable = ['nombre', 'estado']; // recuerda agregar 'estado' si lo usas

    public function grados()
    {
        return $this->hasMany(Grado::class);
    }

    public function cursos()
    {
        return $this->hasMany(Curso::class);
    }
}


