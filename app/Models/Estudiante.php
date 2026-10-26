<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table = 'estudiantes';

    protected $fillable = [
        'id_representante',
        'cedula',
        'nombre',
        'apellido',
        'fecha_nacimiento',
    ];

    public function representante()
    {
        return $this->belongsTo(Representante::class, 'id_representante');
    }

    public function catequesis()
    {
        return $this->hasOne(Catequesi::class, 'id_estudiante');
    }


}
