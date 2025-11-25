<?php

namespace App\Http\Controllers;

use App\Models\Nivel;
use Illuminate\Http\Request;

class NivelController extends Controller
{
    public function index()
    {
        $niveles = Nivel::all();
        return view('niveles.index', compact('niveles'));
    }

    public function create()
    {
        return view('niveles.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nombre' => 'required']);
        Nivel::create($request->all());
        return redirect()->route('niveles.index');
    }

    public function edit(Nivel $nivele)
    {
        return view('niveles.edit', compact('nivele'));
    }

    public function update(Request $request, Nivel $nivele)
    {
        $request->validate(['nombre' => 'required']);
        $nivele->update($request->all());
        return redirect()->route('niveles.index');
    }

    public function destroy(Nivel $nivele)
    {
        $nivele->delete();
        return redirect()->route('niveles.index');
    }
}

