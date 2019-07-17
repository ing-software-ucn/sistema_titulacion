@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#553d0d; color:white;font-size: 20px; display:block">bienvenid@ {{ Auth::user()->name }}</div>
                <div class="panel-body" style="background-color:#d6d6d6; float:left">
                    
                    
                    @if(Auth::user()->rol == 'SECRETARIA')
                    <td width="10px">
                                    <a href="{{ route('estudiantes.index') }}" class="btn btn-sm btn-default hol" style="background-color:#F3FAFB;color: black; padding: 15px 15px;font-size:20px;position: relative; left: 200px;display:block">
                                        Registro estudiantes
                                    </a>
                    </td>

                    <td width="10px">
                                    <a href="{{ route('academicos.index') }}" class="btn btn-sm btn-default hol " style="background-color:#F3FAFB  ;color: black; padding: 15px 15px;font-size:20px;position: relative; left: 200px;display:block">
                                        Registro academicos
                                    </a>
                    </td>
                        
                    <td width="10px">
                                    <a href="{{ route('actividades.index') }}" class="btn btn-sm btn-default hol"style="background-color:#F3FAFB;color: black; padding: 15px 15px;font-size:20px;position: relative; left: 200px ;display:block">
                                        Registro tipo Actividad
                                    </a>
                    </td>
                    <td width="10px">
                                    <a href="{{ route('Autorizar') }}" class="btn btn-sm btn-default hol" style="background-color:#F3FAFB;color: black; padding: 15px 15px;font-size:20px;position: relative; left: 200px;display:block">
                                        Autorizar Actividad
                                    </a>
                    </td>
                    <td width="10px">
                                    <a href="{{ route('inscripcionFormal.index') }}" class="btn btn-sm btn-default hol " style="background-color:#F3FAFB;color: black; padding: 15px 15px;font-size:20px;position: relative; left: 200px;display:block">
                                        Inscripcion Formal
                                    </a>
                    </td>
                    <td width="10px">
                        
                                    <a href="{{ route('registrarExamen.index') }}" class="btn btn-sm btn-default hol"style="background-color:#F3FAFB;color: black; padding: 15px 15px;font-size:20px;position: relative; left: 200px ;display:block">
                                        Registrar Examen de Titulo
                                    </a>
                    </td>
                    <td width="10px">
                        
                        <a href="{{ route('anularTrabajo.index') }}" class="btn btn-sm btn-default hol"style="background-color:#F3FAFB;color: black; padding: 15px 15px;font-size:20px;position: relative; left: 200px; display:block">
                            Anular trabajo
                        </a>
                    </td>
                        
                    @endif

                    @if(Auth::user()->rol == 'TITULACION')
                    <td width="10px">
                                    <a href="{{ route('estudiantes.index') }}" class="btn btn-sm btn-default hol" style="background-color:#F3FAFB;color: black; padding: 15px 15px;font-size:20px;position: relative; left: 200px; display:block">
                                        Registro estudiantes
                                    </a>
                    </td>

                    <td width="10px">
                                    <a href="{{ route('actividades.index') }}" class="btn btn-sm btn-default hol"style="background-color:#F3FAFB;color: black; padding: 15px 15px;font-size:20px;position: relative; left: 200px; display:block">
                                        Registro tipo Actividad
                                    </a>
                    </td>
                    <td width="10px">
                                    <a href="{{ route('Autorizar') }}" class="btn btn-sm btn-default hol"style="background-color:#F3FAFB;color: black; padding: 15px 15px;font-size:20px;position: relative; left: 200px; display:block">
                                        Autorizar Actividad
                                    </a>
                    </td>
                    <td width="10px">
                                    <a href="{{ route('registrarExamen.index') }}" class="btn btn-sm btn-default hol"style="background-color:#F3FAFB;color: black; padding: 15px 15px;font-size:20px;position: relative; left: 200px; display:block">
                                        Registrar Examen de Titulo
                                    </a>
                    </td>


                    @endif

                    @if(Auth::user()->rol == 'ACADEMICO')
                        
                        

                    @endif

                    @if(Auth::user()->rol == 'VINCULACION')
                        
                    <td width="10px">
                                    <a href="{{ route('academicos.index') }}" class="btn btn-sm btn-default hol " style="background-color:#F3FAFB;color: black; padding: 15px 15px;font-size:20px;position: relative; left: 200px; display:block">
                                        Registro academicos
                                    </a>
                    </td>

                    <td width="10px">
                                    <a href="{{ route('actividades.index') }}" class="btn btn-sm btn-default hol"style="background-color:#F3FAFB;color: black; padding: 15px 15px;font-size:20px;position: relative; left: 200px; display:block">
                                        Registro tipo Actividad
                                    </a>
                    </td>    

                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
