<div class="container">
<!-- Este es el form de Inscripcion Formal -->
    <div class="form-group" style="width: 170px">
        {{ Form::label('numero_registro','Numero de Registro')}}
        {{ Form::text('numero_registro',null, ['class'=>'form-control'])}}
    </div>

    <div class="form-group">
        {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary float-left']) }}       
        <a href="{{ route('inscripcionFormal.index') }}" class="btn btn-sm btn-primary float-right">Atras</a>
    </div>

</div>