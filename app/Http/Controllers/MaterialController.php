<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'unidadMedida' => 'required|string',
            'descripcion' => 'required|string',
            'ubicacion' => 'required|string',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $material = Material::create($validated);

        return redirect()->back()->with('success', 'Material creado correctamente');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'codigo' => 'required|integer',
            'unidadMedida' => 'required|string|max:100',
            'descripcion' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:100',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $material = Material::findOrFail($id);
        $material->update($request->all());

        return redirect()->route('material.edit', $material->id)
            ->with('success', 'Material actualizado correctamente.');
    }
    public function index()
    {
        $materiales = Material::with('categoria')->get();

        return view('material.index', compact('materiales'));
    }
}
