<?php

namespace App\Http\Controllers;

use App\Trabajo;
use App\Academico;
//use App\Trabajo;
use App\Http\Controllers\Controller;
use App\Http\Requests\AutorizarUpdateRequest;
use Illuminate\Http\Request;



class AutorizarController extends Controller
{
    //
    public function index()
    {
        $trabajos = Trabajo::orderBy('id','DESC')
            ->where('estado','ACEPTADA')
            ->orWhere('estado','INGRESADA')
            ->paginate();

        return view('trabajos.AutorizarTrabajo', compact('trabajos'));
    }

    public function edit($id){

        $trabajo =Trabajo::find($id);

        $guias = $trabajo->agregarAcademico()->where('tipo','GUIA')->get();
        $academicos = Academico::orderBy('id','ASC')->whereNotIn('id',$guias->pluck('id')->toArray())->get();

        $max =  3 - $guias->count();
        return view('trabajos.agregarComision', compact('trabajo','guias','academicos','max'));
    }

    public function update(Request $request, $id){
        //dd($request);
        $max = $request->max;
        $trabajo = Trabajo::find($id);
        $comisionId;
        for ($i=0; $i <$max ; $i++) {
            $comisionId[$i] = $request->all()['nombre'.$i];
        }

        for ($i=0; $i <$max ; $i++) {
            if($comisionId != null){
            $trabajo->agregarAcademico()->attach($comisionId[$i], ['tipo' => 'CORRECTOR']);
            }
        }
        $trabajo->estado = 'ACEPTADA';
        $trabajo->save();
        
        return  redirect()->route('autorizar.index')->with('info','Trabajo autorizado correctamente');

    }
}
