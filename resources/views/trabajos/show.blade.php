@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Ver Trabajo

                </div>
            
                <div class="panel-body">
                    <p><strong>Titulo: </strong> {{ $trabajo->nombre_trabajo}}</p>
                    <p><strong>Estado: </strong> {{ $trabajo->estado }}</p>
                    <p><strong>Semestre de registro: </strong> {{ $trabajo->semestre }}</p>
                    <p><strong>Año de registro: </strong> {{ $trabajo->año }}</p>
                    <p><strong>Fecha de inicio</strong> {{ $trabajo->fecha_inicio }}</p>
                    <p><strong>Fecha de termino</strong> {{ $trabajo-> fecha_termino}}</p>

                    @foreach($actividad as $act)
                        <p><strong>Tipo De Actividad: </strong>{{$act->nombre_actividad}}</p>
                        @if($act->org_externa == 'SI')
                            <p><strong>Organización nombre: </strong>{{$trabajo->org_nombre}}</p>
                            <p><strong>Organización tutor: </strong>{{$trabajo->tutor_nombre}}</p>
                        @endif
                    @endforeach

                    @if($trabajo->numero_registro != NULL)
                        <p><strong>Codigo Curricular: </strong>{{$trabajo->numero_registro}}</p>
                    @endif

                    @if($trabajo->estado =='FINALIZADA')
                        <p><strong>Fecha De Titulación: </strong>{{$trabajo->fecha_examen}}</p>
                        <p><strong>Nota: </strong>{{$trabajo->nota}}</p>
                    @endif
                
                    @foreach($estudiantes as $estudiante)
                        <p><strong>Alumn@: </strong>{{$estudiante->nombre}}</p>
                    @endforeach

                    @foreach($academicos_guia as $guia)
                        <p><strong>Academico guia: </strong>{{$guia->nombre}}</p>
                    @endforeach

                    @foreach($academicos_corrector as $corrector)
                        <p><strong>Corrector: </strong>{{$corrector->nombre}}</p>
                    @endforeach




                




                    <label class="col-md-0">
                       <a href="{{ route( 'trabajos.index' ) }}" class="btn btn-sm btn-primary float-right">Atras</a>
                    </label>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection