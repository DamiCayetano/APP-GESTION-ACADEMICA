<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use App\Models\Alumno;
use App\Models\Nivel;
use App\Models\Grado;
use App\Models\Seccion;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    public function index()
    {
        $matriculas = Matricula::with('alumno', 'nivel', 'grado', 'seccion')->get();
        return view('matriculas.index', compact('matriculas'));
    }

    public function create()
    {
        return view('matriculas.create', [
            'alumnos' => Alumno::all(),
            'niveles' => Nivel::all(),
            'grados' => Grado::all(),
            'secciones' => Seccion::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'alumno_id' => 'required',
            'nivel_id' => 'required',
            'grado_id' => 'required',
            'seccion_id' => 'required',
            'anio_academico' => 'required',
        ]);

        Matricula::create($request->all());
        return redirect()->route('matriculas.index');
    }

    public function edit(Matricula $matricula)
    {
        return view('matriculas.edit', [
            'matricula' => $matricula,
            'alumnos' => Alumno::all(),
            'niveles' => Nivel::all(),
            'grados' => Grado::all(),
            'secciones' => Seccion::all(),
        ]);
    }

    public function update(Request $request, Matricula $matricula)
    {
        $request->validate([
            'alumno_id' => 'required',
            'nivel_id' => 'required',
            'grado_id' => 'required',
            'seccion_id' => 'required',
            'anio_academico' => 'required',
        ]);

        $matricula->update($request->all());
        return redirect()->route('matriculas.index');
    }

    public function destroy(Matricula $matricula)
    {
        $matricula->delete();
        return redirect()->route('matriculas.index');
    }
}

