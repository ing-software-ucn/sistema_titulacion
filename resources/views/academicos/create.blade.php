@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Ingresar Academico :C 

                </div>
            
                <div class="card-body">
                    {!! Form::open(['route' => 'academicos.store']) !!}
                        @include('academicos.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection