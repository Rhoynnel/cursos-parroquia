<?php

namespace App\Http\Controllers;

use App\Models\Representante;

use Illuminate\Http\Request;

class RepresentanteController extends Controller
{
    public function index()
    {
        $representantes = Representante::paginate(10);
        return view('representantes.index', compact('representantes'));
    }

    public function store()
    {
        $data = request()->validate([
            'cedula' => 'required|integer|unique:representantes,cedula',
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'telefono' => 'required|string',
            'direccion' => 'required|string',
        ]);

        Representante::create($data);

        return redirect()->route('representantes.index')->with('success', 'Representante creado exitosamente.');
    }

    public function update(Representante $representante)
    {
        $data = request()->validate([
            'cedula' => 'required|integer|unique:representantes,cedula,' . $representante->id,
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'telefono' => 'required|string',
            'direccion' => 'required|string',
        ]);

        $representante->update($data);

        return redirect()->route('representantes.index')->with('success', 'Representante actualizado exitosamente.');
    }
}
