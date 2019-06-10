@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Editar Actividad (tipo)
                </div>
            
                <div class="panel-body">
                    {!! Form::model($actividad, ['route' => ['actividades.update',$actividad->id], 'method' => 'PUT']) !!}
                        @include('actividades.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection