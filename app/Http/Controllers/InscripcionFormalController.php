<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InscripcionFormalUpdateRequest;
use App\Trabajo;

class InscripcionFormalController extends Controller
{
    public function index()
    {
        $trabajos = Trabajo::orderBy('id','DESC')
        ->where('estado','ACEPTADA')
        ->whereNull('numero_registro')
        ->paginate();

        return view('trabajos.InscripcionFormal', compact('trabajos'));

    }
    public function edit($id)
    {
        $trabajo = Trabajo::find($id);
        return view('trabajos.edit3', compact('trabajo'));

    }
    public function update(InscripcionFormalUpdateRequest $request, $id)
    {
        $trabajo = Trabajo::find($id);

        $trabajo->fill($request->all())->save();

        return redirect()->route('inscripcionFormal.index')
            ->with('info','Inscripcion Formal Completada');

    }
}
