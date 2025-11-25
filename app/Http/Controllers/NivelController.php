<?php

namespace App\Http\Controllers;

use App\Models\Nivel;
use App\Models\Grado;
use App\Models\Seccion;
use Illuminate\Http\Request;

class NivelController extends Controller
{
    public function index()
    {
        $niveles = Nivel::with('grados.secciones')->get();
        return view('estructura-colegial.index', compact('niveles'));
    }

    public function estructura()
    {
        $niveles = Nivel::with('grados.secciones')->get();
        return view('estructura-colegial.index', compact('niveles'));
    }

    /** =============================
     *  FORMULARIO PARA CREAR
     * =============================*/
    public function create()
    {
        return view('estructura-colegial.create');
    }

    /** =============================
     *  GUARDAR NUEVO NIVEL
     * =============================*/
    public function store(Request $request)
    {
        $request->validate([
            'nivel' => 'required',
            'estado' => 'required',
            'grado' => 'required',
            'seccion' => 'required|array'
        ]);

        $nivel = Nivel::create([
            'nombre' => $request->nivel,
            'estado' => $request->estado
        ]);

        $grado = $nivel->grados()->create([
            'nombre' => $request->grado
        ]);

        foreach ($request->seccion as $sec) {
            $grado->secciones()->create([
                'nombre' => $sec
            ]);
        }

        return redirect()->route('niveles.index')->with('success', 'Nivel creado correctamente.');
    }

    /** =============================
     *  FORMULARIO PARA EDITAR
     * =============================*/
    public function edit($id)
    {
        $nivel = Nivel::with('grados.secciones')->findOrFail($id);
        return view('estructura-colegial.edit', compact('nivel'));
    }

    /** =============================
     *  GUARDAR CAMBIOS
     * =============================*/
    public function update(Request $request, $id)
    {
        $request->validate([
            'nivel' => 'required',
            'estado' => 'required',
        ]);

        $nivel = Nivel::findOrFail($id);
        $nivel->update([
            'nombre' => $request->nivel,
            'estado' => $request->estado
        ]);

        return redirect()->route('niveles.index')->with('success', 'Nivel actualizado correctamente.');
    }

    /** =============================
     *  ELIMINAR
     * =============================*/
    public function destroy(Nivel $nivel)
    {
        $nivel->delete();
        return redirect()->route('niveles.index')->with('success', 'Nivel eliminado.');
    }
}


