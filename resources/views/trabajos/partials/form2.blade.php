<div class="container">
<!-- Este es el form de RexExTitulo -->
    <div class="form-group" style="width: 170px">
        {{ Form::label('nota','Nota final')}}
        {{ Form::text('nota',null, ['class'=>'form-control'])}}
    </div>

    <div class="form-group"style="width: 170px">
        {{ Form::label('fecha_examen','Fecha Examen',)}}        
        {{ Form::date('fecha_examen',new \DateTime(), ['class'=>'form-control'])}} 
    </div>



    <div class="form-group">
        {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary float-left']) }}       
        <a href="{{ route('registrarExamen.index') }}" class="btn btn-sm btn-primary float-right">Atras</a>
    </div>

</div>