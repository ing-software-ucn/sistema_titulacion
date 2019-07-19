<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class trabajo extends Model
{
    protected $fillable = [
        'id_actividad', 'nombre_trabajo', 'org_nombre', 'tutor_nombre', 
        'numero_registro','nota', 'fecha_inicio','fecha_termino','fecha_examen',
        'año','semestre', 'estado',
    ];

    public function agregarAcademico(){

        return $this->belongsToMany('App\academico')
            ->withPivot('tipo')
            ->withTimestamps();
    }

    public function agregarEstudiante(){

        return $this->belongsToMany('App\estudiante');
    }



}
