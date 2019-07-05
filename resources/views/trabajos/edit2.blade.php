@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Registro Examen de Titulo
                </div>
            
                <div class="panel-body">
                    
                    {!! Form::model($trabajo, ['route' => ['registrarExamen.update',$trabajo->id], 'method' => 'PUT']) !!}
                        @include('trabajos.partials.form2')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection