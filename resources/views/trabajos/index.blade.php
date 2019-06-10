@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Trabajos

                    <!--ACA PUEDE IR EL BUSCADOR -->
                </div>
            

                <div class="panel-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Estado</th>
                                <th colspan="6">&nbsp;</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($trabajos as $trabajo)
                            <tr>
                                <td> {{ $trabajo->nombre_trabajo}}</td>
                                <td> {{ $trabajo->estado}}</td>

                                    {!! Form::model($trabajo, ['route' => ['trabajos.update',$trabajo->id], 'method' => 'PUT']) !!}
                                    <div class="container">

                                        <td>
                            
                                            {{ Form::text('numero_registro',null)}}

                                        </td>

                                        <td>{{ Form::submit('Registrar Numero', ['class' => 'btn btn-sm btn-primary float-left']) }}</td>
                                    </div>
                                    {!! Form::close() !!}
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route( 'home' ) }}" class="btn btn-sm btn-primary pull-right">Atras</a>
                    {{ $trabajos->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection