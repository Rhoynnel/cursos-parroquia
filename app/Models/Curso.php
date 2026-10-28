<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'cursos';

    protected $fillable = [
        'descripcion',
        'status',
    ];

    public function catequesis()
    {
        return $this->hasMany(Catequesi::class, 'id_curso');
    }

    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class, 'id_curso');
    }
}
