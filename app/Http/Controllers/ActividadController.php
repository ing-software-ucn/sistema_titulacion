<?php

namespace App\Http\Controllers;


use App\Actividad;
use App\Http\Requests\ActividadStoreRequest;
use App\Http\Requests\ActividadUpdateRequest;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $actividades= Actividad::orderBy('id','DESC')->paginate();

       return view('actividades.index',compact('actividades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('actividades.create');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActividadStoreRequest $request)
    {
        $actividad = Actividad::create($request->all());

        return redirect()->route('actividades.index');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { //
        $actividad = Actividad::find($id);

        return view('actividades.show',compact('actividad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $actividad =Actividad::find($id);
        return view('actividades.edit', compact('actividad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActividadUpdateRequest $request, $id)
    {
        $actividad = Actividad::find($id);
        $actividad->fill($request->all())->save();

        return redirect()->route('actividades.edit',$actividad->id)
          ->with('info','Actividad de titulacion editada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ////  
        Actividad::find($id)->delete();

        return back()->with('info',' Actividad de titulacion eliminada correctamente');
    }
}
