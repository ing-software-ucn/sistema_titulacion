<?php

namespace App\Http\Controllers;


use App\Trabajo;
use App\Http\Controllers\Controller;
use App\Http\Requests\TrabajoStoreRequest;
use App\Http\Requests\TrabajoUpdateRequest;

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
        $trabajo = Trabajo::find($id);

        $trabajo->fill($request->all())->save();

        return back()->with('info','Inscripcion Formal Completada');
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

    public function indexCurricular()
    {
        $trabajos = Trabajo::orderBy('id','DESC')
            ->where('estado','ACEPTADA')
            ->whereNull('numero_registro')
            ->paginate();

        return view('trabajos.index', compact('trabajos'));
    }
    public function updateCurricular(TrabajoUpdateRequest $request, $id){
        $trabajo = Trabajo::find($id);

        $trabajo->fill($request->all())->save();

        return back()->with('info','Inscripcion Formal Completada');
    }
}
