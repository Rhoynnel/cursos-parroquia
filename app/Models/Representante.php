<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Representante extends Model
{
    protected $table = 'representantes';

    protected $fillable = [
        'cedula',
        'nombre',
        'apellido',
        'telefono',
        'direccion',
    ];

    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class, 'id_representante');
    }
}
