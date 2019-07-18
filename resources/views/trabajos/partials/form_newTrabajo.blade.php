<div class="form-group">
    {{ Form::label('title','Titulo')}}
    {{ Form::text('title',null, ['class'=>'form-control','id'=>'title'])}}
</div>


<!--SELECCION DE TIPO DE ACTIVIDAD-->
<div class="form-group">
    <div hidden class="form-group">
        <select class="form-control" name="actividad_select" id="actividad_select" >
            @foreach($actividades as $actividad)
                <option value="{{$actividad->org_externa}}" id="{{$actividad->estudiantes_max}}" title = "{{$actividad->nombre_actividad}}">{{$actividad->nombre_actividad}}
                {{session(['id'=>$actividad->id])}}
                </option>
            @endforeach
        </select>
    </div>
    {{Form::label('actividad_id','Seleccione el Tipo de Actividad')}}
    {{Form:: select('actividad_id',$actividades->pluck('nombre_actividad','id'),null,['id'=>'actividad_id','class'=>'form-control','onChange'=>'hide()'])}}
</div>

<script>
        function hide(){
            var opciones = document.getElementById('actividad_select').options;
            var seleccion = document.getElementById('actividad_id').selectedIndex;
            var div = document.getElementById('organization');
            var valor = opciones[seleccion].value;

            if(valor=="SI"){
                div.style="";
            }else{
                div.style="display:none;";
            }
        }
</script>


<!--SELECCION DE ESTUDIANTES-->
<br>

<div class="form-group">
    <div>
        <span id="notvalid" style="color:red"></span>
    </div>
    
        <div class="table-responsive-sm "> <!--no estoy seguro si dice "is" o "sm"-->
            <strong>{{form::label('array_estudiantes', 'Seleccione les Estudiante(s) ')}}</strong> <br>
        <div class="btn-group btn-sm" role="group" aria-label="Basic example">

            <input class="form-control" type="text" size="25"
            placeholder="Filtrar por rut" id="myInput" onkeyup="filtrarRUT()">
        </div>

        <div style="width: 500px; height: 250px; overflow-y: scroll;">
            <table class="table table-md" id="myTable">
                <thead>
                    <tr>
                        <th width="10px">RUN</th>
                        <th>Nombre</th>
                        <th colspan="3"> </th>
                    </tr>
                </thead>
                    <tbody>
                        @foreach($estudiantes as $estudiante)
                            <tr>
                                <td>{{$estudiante->run}}</td>
                                <td>{{$estudiante->nombre}}</td>
                                <td width="10px">
                                <input name="estudiantes[]" id="estudiantes" type="checkbox" value="{{$estudiante->id}}" onclick="return maximosEstudiantes()"></td>
                            </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
        <div class="btn btn-primary float-right">
            <a href="{{route('estudiantes.create')}}" class="btn btn-sm btn-primary">
                                Nuevo Estudiante
            </a>
        </div>
    </div>
</div>

<br>

<!-- SELECCIONAR ACADEMICOS GUIAS -->
<br>

<div class="form-group">
    <div>
        <span id="notvalid2" style="color:red"></span>
    </div>
    
        <div class="table-responsive-sm"> <!--no estoy seguro si dice "is" o "sm"-->
            <strong>{{form::label('array_academicos', 'Seleccione hasta 2 academicos Guias (*) ')}}</strong> <br>
        <div class="btn-group btn-sm" role="group" aria-label="Basic example">

            <input class="form-control" type="text" size="25"
            placeholder="Filtrar por rut" id="myInput_1" onkeyup="filtrarAcademicoPorRut()">
        </div>

        <div style="width: 500px; height: 250px; overflow-y: scroll;">
            <table class="table table-md" id="myTable_1">
                <thead>
                    <tr>
                        <th width="10px">RUN</th>
                        <th>Nombre</th>
                        <th colspan="3"> </th>
                    </tr>
                </thead>
                    <tbody>
                        @foreach($academicos as $academico)
                            <tr>
                                <td>{{$academico->run}}</td>
                                <td>{{$academico->nombre}}</td>
                                <td width="10px">
                                <input name="academicos[]" id="academicos" type="checkbox" value="{{$academico->id}}" onclick="return checkMaxAcademics()"></td>
                            </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
        <div class="btn btn-primary float-right">
            <a href="{{route('academicos.create')}}" class="btn btn-sm btn-primary">
                                Nuevo Academico
            </a>
        </div>
    </div>
</div>

<br>

<!-- SELECCIONAR FECHAS DE INICIO Y TERMINO-->
<div class="form-group"style="width: 170px">
    <strong>{{Form::label('fecha_inicio', 'Fecha de Inicio: ')}}</strong>
    <br>
    <input class ='form-control' type = 'date' id='fecha_inicio' name='fecha_inicio' onchange="setFechaMinima()">
</div>

<br>

<div class="form-group"style="width: 170px">
    <strong>{{Form::label('fecha_termino', 'Fecha de Término: ')}}</strong>
    <br>
    <input class ='form-control' type = 'date' id='fecha_termino' name='fecha_termino' >
</div>

<!-- SELECCIONAR ORGANIZACION EXTERNA -->
<div class="form-group" id = "organization" style="display:none;" name="organization">

<strong>{{Form::label('name_ext_org', 'Nombre Organización Externa: ')}}</strong>
{{Form::text('name_ext_org',null,['class' => 'form-control','id'=>'name_ext_org'])}}

<strong>{{Form::label('tutor_ext_org','Tutor(*): ')}}</strong>
{{Form::text('tutor_ext_org',null,['class' => 'form-control','id'=>'tutor_ext_org','value'=>''])}}
</div>

<!-- Enviar FORM -->
<div class="form-group text-center">
    {{
      Form::submit('Crear Trabajo',['class'=>'btn btn-success'])
    }}
</div>





<script>
        function maximosEstudiantes(){
            var a = document.getElementsByName('estudiantes[]');
            var limit = limite();
            var newvar = 0;
            var count;
            for(count = 0; count<a.length; count++){
                if(a[count].checked == true){
                    newvar=newvar+1; //asumo que es un +1, no se nota en la foto
                }
            }

            if(newvar>limit){
                document.getElementById('notvalid').innerHTML="Limite de alumnos en actividad (Maximos: "+limit+")"
                return false;
            }else{
                document.getElementById('notvalid').innerHTML=""
                return true;
            }

        }

        function limite(){
            var opciones = document.getElementById('actividad_select').options;
            var seleccion = document.getElementById('actividad_id').selectedIndex;
            var limite = opciones[seleccion].id;

            return limite;
        }

        function filtrarRUT(){
            var input, filter, table, tr, td, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i=0; i<tr.length; i++){
                td = tr[i].getElementsByTagName("td")[0]; //preguntale al alvaro si esta linea esta bien porque no se nota mucho en la foto
                if (td){
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1){
                        tr[i].style.display = "";
                    }else{
                        tr[i].style.display = "none";
                    }
                }          
            }
        }

        function filtrarAcademicoPorRut() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("myInput_1");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable_1");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        function checkMaxAcademics(){
            var cant = document.getElementsByName('academicos[]');
            var cont = 0;
            for(var i = 0; i<cant.length;i++){
                if(cant[i].checked){
                    cont++;
                }
            }
            if(cont>2){
                document.getElementById('notvalid2').innerHTML="Maximo 2 academicos Guias";
                return false;
            }
            else{
                document.getElementById('notvalid2').innerHTML= "";
                return true;
            }
        }



</script>

