<?php

namespace App\Http\Controllers;

use App\Models\Centro;

use Illuminate\Http\Request;

class CentrosController extends Controller
{
    public function index()
    {
        $centros = Centro::paginate(10);
        return view('centro.index', compact('centros'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'nullable|string',
            'direccion' => 'nullable|string',
        ]);

        Centro::create($data);

        return redirect()->route('centro.index')->with('success', 'Centro creado exitosamente.');
    }

    public function update(Centro $centro)
    {
        $data = request()->validate([
            'nombre' => 'required|string',
            'direccion' => 'required|string',
        ]);

        $centro->update($data);

        return redirect()->route('centro.index')->with('success', 'Centro actualizado exitosamente.');
    }
}
