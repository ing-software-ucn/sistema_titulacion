<?php

namespace App\Http\Controllers;


use App\Trabajo;
use App\Http\Controllers\Controller;
use App\Http\Requests\TrabajoStoreRequest;
use App\Http\Requests\TrabajoUpdateRequest;
use App\Http\Requests\TrabajoExamenRequest;
use Illuminate\Http\Request;

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
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $actividades = Actividad::orderBy('nombre_actividad','DESC')
            ->pluck('nombre_actividad','id');
        $estudiantes = Estudiante::orderBy('nombre','run');
        return view('trabajos.createTrabajo',compact('actividades'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrabajoStoreRequest $request)
    {

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { //

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
