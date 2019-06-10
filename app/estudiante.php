<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class estudiante extends Model
{
    protected $fillable = [
        'nombre', 'run', 'carrera', 'telefono', 'correo'
    ];

}
