<?php

namespace App\Http\Controllers;

use App\Trabajo;
use App\Http\Controllers\Controller;
use App\Http\Requests\AutorizarStoreRequest;
use App\Http\Requests\AutorizarUpdateRequest;
use Illuminate\Http\Request;

use App\Estudiante;
use App\Actividad;
use App\Academico;
use App\Autorizar;

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
}
