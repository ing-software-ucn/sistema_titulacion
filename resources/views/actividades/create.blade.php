@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Ingresar Actividad ( tipo) 

                </div>
            
                <div class="card-body">
                    {!! Form::open(['route' => 'actividades.store']) !!}
                        @include('actividades.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection