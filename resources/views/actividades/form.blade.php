<div class="container">

<div class="form-group" style="width: 700px">

    <div class="col-md-4">
        
        {{ Form::label('nombre_actividad','Nombre de Actividad')}}
    </div>

    {{ Form::text('nombre_actividad',null, ['class'=>'form-control']) }}
</div>

<div class="form-group"style="width: 700px">
    <div class="col-md-4">
    {{ Form::label('estudiantes_max','Cantidad de estudiantes','')}}
    </div>
    {{ Form::selectRange('estudiantes_max',1,6)}}   
</div>

<div class="form-group"style="width: 700px">
    <div class="col-md-3">
        {{ Form::label('duracion_semestres','Duracion Semestral','')}}
    </div>
    {{ Form::selectRange('duracion_semestres',1,3)}}  
</div>

<div class="form-group">
    <div class="col-md-3 col-form-label text">{{ Form::label('org_externa', 'Organizacion Externa') }}</div>
        <div class="col-md-6">
            <label class="col-md-2">
                {{ Form::radio('org_externa', 'SI',['class'=>'form-control'])}} SI
            </label>
            <label class="col-md-2">
                {{ Form::radio('org_externa', 'NO',['class'=>'form-control']) }} NO
            </label>
        </div>
    </div>
</div>


<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary float-left']) }}
    
    
    <a href="{{ route( 'actividades.index' ) }}" class="btn btn-sm btn-primary float-right">Atras</a>
</div>

</div>