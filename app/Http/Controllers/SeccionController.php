<?php

namespace App\Http\Controllers;

use App\Models\Seccion;
use Illuminate\Http\Request;

class SeccionController extends Controller
{
    public function index()
    {
        $secciones = Seccion::all();
        return view('secciones.index', compact('secciones'));
    }

    public function create()
    {
        return view('secciones.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nombre' => 'required']);
        Seccion::create($request->all());
        return redirect()->route('secciones.index');
    }

    public function edit(Seccion $seccione)
    {
        return view('secciones.edit', compact('seccione'));
    }

    public function update(Request $request, Seccion $seccione)
    {
        $request->validate(['nombre' => 'required']);
        $seccione->update($request->all());
        return redirect()->route('secciones.index');
    }

    public function destroy(Seccion $seccione)
    {
        $seccione->delete();
        return redirect()->route('secciones.index');
    }
}

