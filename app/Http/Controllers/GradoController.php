<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use App\Models\Nivel;
use Illuminate\Http\Request;

class GradoController extends Controller
{
    public function index()
    {
        $grados = Grado::with('nivel')->get();
        return view('grados.index', compact('grados'));
    }

    public function create()
    {
        $niveles = Nivel::all();
        return view('grados.create', compact('niveles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'nivel_id' => 'required'
        ]);

        Grado::create($request->all());
        return redirect()->route('grados.index');
    }

    public function edit(Grado $grado)
    {
        $niveles = Nivel::all();
        return view('grados.edit', compact('grado', 'niveles'));
    }

    public function update(Request $request, Grado $grado)
    {
        $request->validate([
            'nombre' => 'required',
            'nivel_id' => 'required'
        ]);

        $grado->update($request->all());
        return redirect()->route('grados.index');
    }

    public function destroy(Grado $grado)
    {
        $grado->delete();
        return redirect()->route('grados.index');
    }
}

