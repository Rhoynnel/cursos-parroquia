<?php

namespace App\Http\Controllers;

use App\Models\catequesi;
use App\Models\Estudiante;
use App\Models\Representante;
use App\Models\Centro;
use App\Models\Curso;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    public function index()
    {
        $centros = Centro::all();
        $cursos = Curso::all();
        return view('inscripcion.index', compact('centros', 'cursos'));
    }

   public function store(Request $request)
{
    // 1. Validaciones opcionales del Request...
    //dd($request->all()); // Para depuración, eliminar en producción
    
    DB::transaction(function () use ($request) {
        // 2. Guardar datos del Representante
        $repData = $request->input('representante');
        $representante = Representante::create([
            'cedula'    => $repData['cedula'],
            'nombre'    => $repData['nombre'],
            'apellido'  => $repData['apellido'],
            'telefono'  => $repData['telefono'],
            'direccion' => $repData['direccion'],
        ]);

        // 3. Iterar y guardar los Estudiantes y su asignación en Catequesis
        $estudiantesData = $request->input('estudiantes', []);

        foreach ($estudiantesData as $estData) {
            // Guardar Estudiante
            $estudiante = Estudiante::create([
                'id_representante' => $representante->id, // Foreign Key
                'cedula'           => $estData['cedula'] ?? null,
                'nombre'           => $estData['nombre'],
                'apellido'         => $estData['apellido'],
                'fecha_nacimiento' => $estData['fecha_nacimiento'],
            ]);

            // Guardar en Tabla Catequesis
            Catequesi::create([
                'id_estudiante' => $estudiante->id,
                'id_centro'     => $repData['id_centro'], // Se asocia el centro del representante
                'id_curso'      => $estData['id_curso'],
            ]);
        }
    });

    return redirect()->back()->with('success', 'Registro completado con éxito.');
}
}
