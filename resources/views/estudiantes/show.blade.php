@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Ver Estudiante

                </div>
            
                <div class="panel-body">
                    <p><strong>Nombre</strong> {{ $estudiante->nombre}}</p>
                    <p><strong>RUN</strong> {{ $estudiante->run}}</p>
                    <p><strong>Telefono</strong> {{ $estudiante->telefono}}</p>
                    <p><strong>Carrera</strong> {{ $estudiante->carrera}}</p>
                    <p><strong>Correo</strong> {{ $estudiante->correo}}</p>
                    <label class="col-md-0">
                       <a href="{{ route( 'estudiantes.index' ) }}" class="btn btn-sm btn-primary float-right">Atras</a>
                    </label>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection