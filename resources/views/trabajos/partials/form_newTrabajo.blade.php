<div class="container">



<div class="form-group" style="width: 700px">
    {{ Form::label('nombre_trabajo','Titulo del trabajo')}}
    {{ Form::text('nombre_trabajo',null, ['class'=>'form-control'])}}
</div>
<div class="form-group" style="width: 700px">
    {{ Form::label('run','RUN')}}
    {{ Form::text('run',null, ['class'=>'form-control'])}}
</div>



<div class="form-group">
    <label class="col-md-2">
        {{ Form::label('telefono', 'Telefono')}}
    </label>
    {{ Form::text('telefono', null, ['class'=>'form-group'])}}  
</div>

<div class="form-group">
    <label class="col-md-2">
        {{ Form::label('correo','Correo')}}
    </label>
    {{ Form::email('correo',null, ['class'=>'form-group'])}}
</div>

<div class="form-group">
    <label class="col-md-2">
        {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary float-left']) }}
    </label>
    <a href="{{ route( 'estudiantes.index' ) }}" class="btn btn-sm btn-primary float-right">Atras</a>  

</div>

</div>