<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Centro extends Model
{
    protected $table = 'centros';
    protected $fillable = [
        'nombre',
        'direccion',
    ];

    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class);
    }

}
