@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Nuevo trabajo de titulacion

                </div>
            
                <div class="card-body">
                    {!! Form::open(['route' => 'trabajos.create']) !!}
                        @include('trabajos.partials.form_newTrabajo')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection