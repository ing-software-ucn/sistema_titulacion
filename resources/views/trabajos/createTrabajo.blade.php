@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading  text-center">
                    Nuevo trabajo de titulacion

                </div>
            
                <div class="card-body">
                    {!! Form::open(['route' => 'trabajos.store']) !!}
                        @include('trabajos.partials.form_newTrabajo')
                    {!! Form::close() !!}

                    <label class="col-md-0">
                       <a href="{{ route( 'trabajos.index' ) }}" class="btn btn-sm btn-primary float-right">Atras</a>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection