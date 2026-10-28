<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;

use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiante::paginate(10);
        return view('estudiantes.index', compact('estudiantes'));
    }

    public function store()
    {
        $data = request()->validate([
            'id_representante' => 'required|integer',
            'cedula' => 'nullable|integer|unique:estudiantes,cedula',
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'fecha_nacimiento' => 'required|date',
        ]);

        Estudiante::create($data);

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante creado exitosamente.');
    }

    public function update(Estudiante $estudiante)
    {
        $data = request()->validate([
            'id_representante' => 'required|integer',
            'cedula' => 'nullable|integer|unique:estudiantes,cedula,' . $estudiante->id,
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'fecha_nacimiento' => 'required|date',
        ]);

        $estudiante->update($data);

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante actualizado exitosamente.');
    }
}
