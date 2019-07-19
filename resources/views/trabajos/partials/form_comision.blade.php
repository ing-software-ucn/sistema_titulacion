<!--Este form permite crear la comisión correctora -->
{{Form::hidden('max',$max)}}
<div hidden id= "alert" class= "alert alert-danger">
    <p>"¡El academico ya fue seleccionado!"</p>
</div>
<div>
        La comision esta formada por:<br>
        Profesores guias:
    @foreach ($guias as $guia)
        <br>{{$guia->nombre}}
    @endforeach
</div>

<br>
Aun falta agregar {{$max}} profesores a la comisión:
<br>
@for ($i=0; $i < $max; $i++)
    <div class = "form-group">
    {{ Form::label('nombre'.$i,'Profesor '.($i+1))}}
    {{ Form::select('nombre'.$i,$academicos->pluck('nombre','id'), null, ['class'=>'form-control','id' =>'nombre'.$i,'onChange'=>'isUnique(this)','placeholder'=>'Seleccione un académico...']) }}
    </div>
@endfor

<div class="form-group text-center">
  {{ Form::submit('Registrar Comision',['class'=>'btn btn-success']) }}
</div>

<script>
    function isUnique(seleccion){
        if(document.getElementById('alert').hidden == false){
            document.getElementById('alert').hidden = true;
        }
        var academicos= [];
        for(var i=0;i<{{$max}};i++){
            academicos[i] = document.getElementById('nombre'+i);
        }
        var coincidencias = academicos.filter(function(item){
            return item.value == seleccion.value;
        })
        if(coincidencias.length > 1){
            document.getElementById('alert').hidden = false;
            seleccion.value = "";
        }
    }
</script>