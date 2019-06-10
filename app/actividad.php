<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class actividad extends Model
{
    protected $fillable = [
        'nombre_actividad', 'estudiantes_max', 'duracion_semestres', 'org_externa', 
    ];
}
