@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Trabajos Ingresados
                    <a href="{{ route('trabajos.create') }}" class="btn btn-sm btn-primary pull-right">
                        Nuevo Trabajo
                    </a>

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

                                <td width="10px">
                                    <a href="{{ route('trabajos.edit', $trabajo->id) }}" class="btn btn-sm btn-default">
                                        Editar
                                    </a>
                                </td>

                                <td width="10px">
                                    <a href="{{ route('trabajos.show', $trabajo->id) }}" class="btn btn-sm btn-default">
                                        Ver
                                    </a>
                                </td>

                                <td width="10px">
                                    {!! Form::model($trabajo ,['route' => ['anularTrabajo.update',$trabajo->id],'method' => 'PUT'] ) !!}
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('¿Segure desea Anular?')">
                                            Anular
                                        </button>
                                    {!! Form::close() !!}
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route( 'home' ) }}" class="btn btn-sm btn-primary pull-right">Atras</a>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection