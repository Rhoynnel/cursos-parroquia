<?php

namespace App\Http\Controllers;

use App\Models\Catequesi;
use App\Models\Estudiante;
use App\Models\Representante;
use App\Models\Centro;
use App\Models\Curso;

use Illuminate\Http\Request;

class CatequesisController extends Controller
{
    public function index()
    {
        $catequesis = Catequesi::with(['estudiante', 'centro', 'curso'])->paginate(10);
        return view('catequesis.index', compact('catequesis'));
    }
}
