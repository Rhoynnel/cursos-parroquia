<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catequesi extends Model
{
    protected $table = 'catequesis';

    protected $fillable = [
        'id_centro',
        'id_curso',
        'id_estudiante',
    ];

    public function centro()
    {
        return $this->belongsTo(Centro::class, 'id_centro');
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'id_curso');
    }

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'id_estudiante');
    }
}
