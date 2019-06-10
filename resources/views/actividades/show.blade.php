@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Ver Tipos de actividad

                </div>
            
                <div class="panel-body">
                    <p><strong>ID del tipo de actividad</strong> {{ $actividad->id}}</p>
                    <p><strong>Nombre del tipo de actividad</strong> {{ $actividad->nombre_actividad}}</p>
                    <p><strong>cantidad maxima </strong> {{ $actividad->estudiantes_max}}</p>
                    <p><strong>Duracion de semestres </strong> {{ $actividad->duracion_semestres}}</p>
                    <p><strong> ¿Requiere participacion externa? </strong> {{ $actividad->org_externa}}</p>
                    <label class="col-md-0">
                        <a href="{{ route( 'actividades.index' ) }}" class="btn btn-sm btn-primary float-right">Atras</a>
                    </label>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection