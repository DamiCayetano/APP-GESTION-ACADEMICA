<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\Curso;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function index()
    {
        $docentes = Docente::all();
        return view('docentes.index', compact('docentes'));
    }

    public function create()
    {
        $cursos = Curso::all();
        return view('docentes.create', compact('cursos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dni' => 'required|unique:docentes',
            'nombres' => 'required',
            'apellidos' => 'required',
            'curso_id' => 'required'
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('docentes', 'public');
        }

        Docente::create($data);

        return redirect()->route('docentes.index');
    }

    public function show($id)
    {
        $docente = Docente::findOrFail($id);
        return view('docentes.show', compact('docente'));
    }

    public function edit($id)
    {
        $docente = Docente::findOrFail($id);
        $cursos = Curso::all();
        return view('docentes.edit', compact('docente', 'cursos'));
    }

    public function update(Request $request, $id)
    {
        $docente = Docente::findOrFail($id);

        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'curso_id' => 'required'
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('docentes', 'public');
        }

        $docente->update($data);

        return redirect()->route('docentes.index');
    }

    public function destroy($id)
    {
        $docente = Docente::findOrFail($id);
        $docente->delete();

        return redirect()->route('docentes.index');
    }
}

