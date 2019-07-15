<div class="container">
<!-- Este es el form de AutorizarTrabajo -->
<div class="form-group" style="width: 700px">
    <div class="col-md-4">
        {{ Form::label('nombre_trabajo','Nombre del trabajo')}}
        
    </div>
    {{ Form::text('nombre_trabajo',null, ['class'=>'form-control'])}}
</div>

<div class="form-group"style="width: 700px">
    <div class="col-md-4">
        {{ Form::label('tutor_nombre','Profesor Guia','')}}        
    </div>
    {{ Form::text('tutor_nombre',null, ['class'=>'form-control'])}} 
</div>



<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary float-left']) }}
    
    
    <a href="{{ route('Autorizar') }}" class="btn btn-sm btn-primary float-right">Atras</a>
</div>

</div>