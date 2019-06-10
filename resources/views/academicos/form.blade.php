<div class="container">

<div class="form-group" style="width: 300px">
    {{ Form::label('run','RUN')}}
    {{ Form::text('run',null, ['class'=>'form-control'])}}
</div>

<div class="form-group" style="width: 700px">
    {{ Form::label('nombre','Nombre del Academico')}}
    {{ Form::text('nombre',null, ['class'=>'form-control'])}}
</div>

<div class="form-group">
    {{ Form::label('correo','Correo')}}
    {{ Form::email('correo',null, ['class'=>'form-group'])}}
</div>

<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary float-left']) }}
    
    
    <a href="{{ route( 'academicos.index' ) }}" class="btn btn-sm btn-primary float-right">Atras</a>
</div>

</div>