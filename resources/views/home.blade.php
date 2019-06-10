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
                                    <a href="{{ route('estudiantes.index') }}" class="btn btn-sm btn-default hol" style="background-color:#0844a4; padding: 100px 30px;font-size:30px;float:left;display:block">
                                        Registro estudiantes
                                    </a>
                    </td>

                    <td width="10px">
                                    <a href="{{ route('academicos.index') }}" class="btn btn-sm btn-default hol " style="color:black; background-color:#a8c6fa; padding: 100px 30px;font-size:30px;float:left;display:block">
                                        Registro academicos
                                    </a>
                    </td>
                        
                    <td width="10px">
                                    <a href="{{ route('actividades.index') }}" class="btn btn-sm btn-default hol"style="background-color:#ff8351; padding: 100px 192px;font-size:30px;float:left; display:block">
                                        Registro tipo Actividad
                                    </a>
                    </td>
                        
                    @endif

                    @if(Auth::user()->rol == 'TITULACION')
                    <td width="10px">
                                    <a href="{{ route('estudiantes.index') }}" class="btn btn-sm btn-default hol" style="background-color:#0844a4; padding: 100px 30px;font-size:30px;float:left;display:block">
                                        Registro estudiantes
                                    </a>
                    </td>

                    <td width="10px">
                                    <a href="{{ route('actividades.index') }}" class="btn btn-sm btn-default hol"style="background-color:#ff8351; padding: 100px 29px;font-size:30px;float:left; display:block">
                                        Registro tipo Actividad
                                    </a>
                    </td>


                    @endif

                    @if(Auth::user()->rol == 'ACADEMICO')
                        
                        

                    @endif

                    @if(Auth::user()->rol == 'VINCULACION')
                        
                    <td width="10px">
                                    <a href="{{ route('academicos.index') }}" class="btn btn-sm btn-default hol " style="color:black; background-color:#a8c6fa; padding: 100px 30px;font-size:30px;float:left;display:block">
                                        Registro academicos
                                    </a>
                    </td>

                    <td width="10px">
                                    <a href="{{ route('actividades.index') }}" class="btn btn-sm btn-default hol"style="background-color:#ff8351; padding: 100px 26px;font-size:30px;float:left; display:block">
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
