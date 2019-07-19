@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading  text-center">
                    Registrar Comision

                </div>
            
                <div class="card-body">
                    {!! Form::model($trabajo, ['route' => ['autorizar.update',$trabajo->id], 'method' => 'PUT']) !!}
                        @include('trabajos.partials.form_comision')
                    {!! Form::close() !!}

                    <label class="col-md">
                       <a href="{{ route( 'autorizar.index' ) }}" class="btn btn-sm btn-primary float-left">Atras</a>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection