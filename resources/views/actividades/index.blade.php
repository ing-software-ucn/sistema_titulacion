@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lista de Actividades
                    <a href="{{ route('actividades.create') }}" class="btn btn-sm btn-primary pull-right">
                        Nuevo
                    </a>
                </div>
            

                <div class="panel-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th colspan="3">&nbsp;</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($actividades as $actividad)
                            <tr>
                                <td> {{ $actividad->id}}</td>
                                <td> {{ $actividad->nombre_actividad}}</td>
                                <td width="10px">
                                    <a href=" {{ route('actividades.show', $actividad->id) }}" class="btn btn-sm btn-default">
                                        Ver
                                    </a>
                                </td>
                                <td width="10px">
                                    <a href="{{ route('actividades.edit', $actividad->id) }}" class="btn btn-sm btn-default">
                                        Editar
                                    </a>
                                </td>
                                <td width="10px">
                                    {!! Form::open(['route' => ['actividades.destroy',$actividad->id],
                                     'method' => 'DELETE'] ) !!}
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('¿Segure desea eliminar?')">
                                            Eliminar
                                        </button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route( 'home' ) }}" class="btn btn-sm btn-primary pull-right">Atras</a>
                    {{ $actividades->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection