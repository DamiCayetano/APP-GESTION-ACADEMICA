<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Nivel;
use App\Models\Grado;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::with('nivel', 'grado')->get();
        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        $niveles = Nivel::all();
        $grados = Grado::all();
        return view('cursos.create', compact('niveles', 'grados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'area' => 'required',
            'nivel_id' => 'required',
            'grado_id' => 'required',
            'horas_semanales' => 'required|numeric',
            'estado' => 'required'
        ]);

        Curso::create($request->all());
        return redirect()->route('cursos.index');
    }

    public function edit(Curso $curso)
    {
        $niveles = Nivel::all();
        $grados = Grado::all();
        return view('cursos.edit', compact('curso', 'niveles', 'grados'));
    }

    public function update(Request $request, Curso $curso)
    {
        $request->validate([
            'nombre' => 'required',
            'area' => 'required',
            'nivel_id' => 'required',
            'grado_id' => 'required',
            'horas_semanales' => 'required|numeric',
            'estado' => 'required'
        ]);

        $curso->update($request->all());
        return redirect()->route('cursos.index');
    }

    public function destroy(Curso $curso)
    {
        $curso->delete();
        return redirect()->route('cursos.index');
    }
}

