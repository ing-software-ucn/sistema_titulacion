<?php

namespace App\Http\Controllers;


use App\Trabajo;
use App\Http\Controllers\Controller;
use App\Http\Requests\TrabajoStoreRequest;
use App\Http\Requests\TrabajoUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

use App\Estudiante;
use App\Actividad;
use App\Academico;


class TrabajoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trabajos = Trabajo::orderBy('id','DESC')->get();
        // retorna la vista y un Array 
        return view('trabajos.index',compact('trabajos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $actividades = Actividad::orderBy('id','ASC')->get();
        $estudiantes = Estudiante::orderBy('id','ASC')->get();
        $academicos = Academico::orderBy('id','ASC')->get();
        return view('trabajos.createTrabajo',compact('actividades','estudiantes','academicos'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrabajoStoreRequest $request)
    {
        if($request->fecha_inicio > $request->fecha_termino){
            return back()->with('error','Fecha de termino debe ser despues de la fecha de inicio ');
        }
        $id_actividad = $request->actividad_id;
        $nombre_trabajo = $request->title;
        $org_nombre = $request->name_ext_org;
        $tutor_nombre = $request->tutor_ext_org;
        $estado = "INGRESADA";

        $academicos = $request->academicos;
        $estudiantes = $request->estudiantes;

        $año = date("Y",strtotime($request->fecha_inicio));
        $mes = date("m",strtotime($request->fecha_inicio));

        if($mes > 7){
            $semestre = "SEGUNDO";
        }else{
            $semestre = "PRIMERO";
        }

        $trabajo = Trabajo::create(['id_actividad' => $id_actividad, 
                        'nombre_trabajo' => $nombre_trabajo, 
                        'org_nombre' => $org_nombre, 
                        'tutor_nombre' => $tutor_nombre, 
                        'fecha_inicio' => $request->fecha_inicio,
                        'fecha_termino' => $request->fecha_termino,
                        'año' => $año,
                        'semestre' => $semestre, 
                        'estado' => $estado,
                        ]);
        
        foreach($academicos as $academico){
            $trabajo->agregarAcademico()->attach($academico);

            DB::table('academico_trabajo')
                ->where('trabajo_id',$trabajo->id)
                ->update(['tipo'=>'GUIA']);
            
            $trabajo->save();
        }

        foreach($estudiantes as $estudiante){
            $trabajo->agregarEstudiante()->attach($estudiante);
            $trabajo->save();


            $tabla1 = DB::table('estudiante_trabajo')->get();
            foreach ($tabla1 as $fila1) {
                if($fila1->estudiante_id == $estudiante && $fila1->trabajo_id != $trabajo->id ){
                    $tabla2 = DB::table('trabajos')->get();
                    foreach ($tabla2 as $fila2){
                        if(($fila2->estado == 'INGRESADA' || $fila2->estado == 'ACEPTADA') && $fila2->id != $trabajo->id ){
                            DB::table('trabajos')
                                ->where('id', $fila2->id)
                                ->update(['estado' => 'ANULADA']);
                        }
                    }

                }
            };
        }

        return redirect()->route('trabajos.create')->with('info','Trabajo creado con éxito');
           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { //
        $trabajo = Trabajo::find($id);
        $actividad = Actividad::find($trabajo->id_actividad);

        $estudiantes = collect([]);
        $academicos_guia = collect([]);
        $academicos_corrector = collect([]);

        //Buscamos todos los estudiantes
        $tabla1 = DB::table('estudiante_trabajo')->get();
        foreach ($tabla1 as $fila1) {
            if($fila1->trabajo_id == $trabajo->id ){
                $tabla2 = DB::table('estudiantes')->get();
                foreach ($tabla2 as $fila2){
                    if($fila2->id == $fila1->estudiante_id){
                        $estudiantes->push($fila2);
                        $estudiantes->all();
                    }
                }

            }
        };

        $tabla3 = DB::table('academico_trabajo')->get();
        foreach ($tabla3 as $fila3) {
            if($fila3->trabajo_id == $trabajo->id && $fila3->tipo == 'GUIA' ){
                $tabla4 = DB::table('academicos')->get();
                foreach ($tabla4 as $fila4){
                    if($fila4->id == $fila3->academico_id){
                        $academicos_guia->push($fila4);
                        $academicos_guia->all();
                    }
                }

            }
        };
        $tabla5 = DB::table('academico_trabajo')->get();
        foreach ($tabla5 as $fila5) {
            if($fila5->trabajo_id == $trabajo->id && $fila5->tipo == 'CORRECTOR' ){
                $tabla6 = DB::table('academicos')->get();
                foreach ($tabla6 as $fila6){
                    if($fila6->id == $fila5->academico_id){
                        $academicos_corrector->push($fila6);
                        $academicos_corrector->all();
                    }
                }

            }
        };

  
        return view('trabajos.show',compact('trabajo','actividad','estudiantes','academicos_guia','academicos_corrector'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TrabajoUpdateRequest $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function autorizartrabajo()
    {
        $trabajos = Trabajo::orderBy('id','DESC')
            ->where('estado','INGRESADA')
            ->whereNull('numero_registro')
            ->paginate();

        return view('trabajos.AutorizarTrabajo', compact('trabajos'));
    }

    

    public function editComisionCorrectora(Request $request)
    {
        $trabajos =Trabajo::find($request->id);

        return view('trabajos.edit', compact('trabajos'));
    }

    public function updateComisioncorrectora(TrabajoUpdateRequest $request, $id)
    {
        $trabajo = Trabajo::find($request->id); 
        $trabajo->fill($request->all())->save();

        return back()->with('info','Comision correctora asignada');
    }

}
