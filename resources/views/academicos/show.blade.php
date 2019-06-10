@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Ver Academico

                </div>
            
                <div class="panel-body">
                    <p><strong>Nombre</strong> {{ $academico->nombre}}</p>
                    <p><strong>RUN</strong> {{ $academico->run}}</p>
                    <p><strong>Correo</strong> {{ $academico->correo}}</p>
                    <label class="col-md-0">
                        <a href="{{ route( 'academicos.index' ) }}" class="btn btn-sm btn-primary float-right">Atras</a>
                    </label>
                
                </div>

            </div>
            
        </div>
    </div>
</div>
@endsection