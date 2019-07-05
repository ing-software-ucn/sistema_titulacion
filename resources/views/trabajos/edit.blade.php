@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Comision Correctora
                </div>
            
                <div class="panel-body">
                    {!! Form::model($trabajos, ['route' => ['correctcom'], 'method' => 'PUT']) !!}
                        @include('trabajos.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection