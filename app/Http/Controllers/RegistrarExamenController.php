<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistrarExamenRequest;
use App\Http\Requests\TrabajoUpdateRequest;
use App\Trabajo;

class RegistrarExamenController extends Controller
{
    public function index()
    {
        $trabajos = Trabajo::orderBy('id','DESC')
            ->where('estado','ACEPTADA')
            ->paginate();

        return view('trabajos.RegExTitulo', compact('trabajos'));
    }

    public function edit($id)
    {
        $trabajo = Trabajo::find($id);
        return view('trabajos.edit2', compact('trabajo'));

    }
    public function update(RegistrarExamenRequest $request, $id)
    {
        
        if($request->nota < 1.0  || $request->nota > 7.0){
            return back()->with('error','Nota debe ser entre 1.0 y 7.0 con punto');
        }

        $trabajo = Trabajo::find($id); 

        if($request->fecha_examen < $trabajo->fecha_inicio){
            return back()->with('error','Fecha de examen debe ser despues de la fecha de inicio');
        }
        $request['nota'] = str_replace(',', '.', $request['nota']);
        $trabajo->nota = $request->nota;
        $trabajo->fecha_examen = $request->fecha_examen;
        $trabajo->estado = 'FINALIZADA';
        $trabajo->save();
        return back()->with('info','Examen registrado con exito');
    }
}
