<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    protected $fillable = ['nombre', 'grado_id'];

    // Indicar la tabla correcta
    protected $table = 'secciones';

    public function grado()
    {
        return $this->belongsTo(Grado::class);
    }
}

