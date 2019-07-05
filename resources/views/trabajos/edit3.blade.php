@extends('layouts.app')
<!-- Este es el edit de Inscripcion Formal -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Registro Examen de Titulo
                </div>
            
                <div class="panel-body">
                    
                    {!! Form::model($trabajo, ['route' => ['inscripcionFormal.update',$trabajo->id], 'method' => 'PUT']) !!}
                        @include('trabajos.partials.form3')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection