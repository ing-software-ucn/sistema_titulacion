<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trabajo;

class AnularController extends Controller
{
    public function index()
    {
        $trabajos = Trabajo::orderBy('id','DESC')
            ->where('estado','ACEPTADA')
            ->orWhere('estado','INGRESADA')
            ->paginate();

        return view('trabajos.anularTrabajo', compact('trabajos'));
    }
    public function update(Request $request, $id)
    {
        $trabajo = Trabajo::find($id);
        $trabajo->estado = 'ANULADA';
        $trabajo->save();
        return back()->with('info','Trabajo Anulado correctamente');

    }
}
