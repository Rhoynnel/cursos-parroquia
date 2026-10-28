<?php

namespace App\Http\Controllers;

use App\Models\Curso;

use Illuminate\Http\Request;

class CursosController extends Controller
{
    public function index()
    {
        $cursos = Curso::paginate(10);
        return view('curso.index', compact('cursos'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'descripcion' => 'nullable|string',
            'status' => 'nullable|string',
            
        ]);

        Curso::create($data);

        return redirect()->route('curso.index')->with('success', 'Curso creado exitosamente.');
    }

    public function update(Curso $curso)
    {
        $data = request()->validate([
            'descripcion' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        $curso->update($data);

        return redirect()->route('curso.index')->with('success', 'Curso actualizado exitosamente.');
    }
}
