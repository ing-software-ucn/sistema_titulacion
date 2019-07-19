<!--Este form permite crear la comisión correctora -->
{{Form::hidden('max',$max)}}
<div hidden id= "alert" class= "alert alert-danger">
    <p>"¡No puede seleccionar dos veces el mismo académico!"</p>
</div>
<div>
        La comisión correctora actualmente está constituida por:<br>
        Profesores guias:
    @foreach ($guias as $guia)
        <br>{{$guia->nombre}}
    @endforeach
</div>

<br>
Puede agregar {{$max}} miembros más a la comisión:
<br>
@for ($i=0; $i < $max; $i++)
    <div class = "form-group">
    {{ Form::label('nombre'.$i,'Académico:')}}
    {{ Form::select('nombre'.$i,$academicos->pluck('nombre','id'), null, ['class'=>'form-control','id' =>'nombre'.$i,'onChange'=>'isUnique(this)','placeholder'=>'Seleccione un académico...']) }}
    </div>
@endfor

<div class="form-group text-center">
  {{ Form::submit('Registrar Miembros',['class'=>'btn btn-success']) }}
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