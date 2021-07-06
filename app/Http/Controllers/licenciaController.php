<?php

namespace App\Http\Controllers;

use App\domicilioPersonasModel;
use App\legajosModel;
use App\personasModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class licenciaController extends Controller
{
    public function index(){
        return view('paginas.licencias.index');
    }

    public function formulario_maternidad(){
        $id_usuario = Auth::user()->id;
        $legajo = legajosModel::where('id_usuario', $id_usuario)->get();
        $categoria = $legajo[0]->categoria;
        $id_persona = $legajo[0]->id_personas;
        $persona = personasModel::where('id', $id_persona)->get();
        $edad = $persona[0]->edad;
        $domicilio_persona = domicilioPersonasModel::where('id_persona', $id_persona)->get();
        $domicilio = $domicilio_persona[0]->descripcion_domicilio;
        $añoactual = Carbon::now();
        $año = $añoactual->format('Y');
        $fecha =$añoactual->format('d-m-Y');
        $hora_actual = Carbon::now()->timezone("America/Argentina/Buenos_Aires");
        $hora =$hora_actual->format('H:i:s');
        //dd($fecha);
        // dd($año);
        return view('paginas.licencias.formulario_maternidad',compact('año','fecha','hora','categoria','edad','domicilio'));

    }

    public function formulario_enfermedad(){
        $añoactual = Carbon::now();
        $año = $añoactual->format('Y');
        $fecha =$añoactual->format('d-m-Y');
        $hora_actual = Carbon::now()->timezone("America/Argentina/Buenos_Aires");
        $hora =$hora_actual->format('H:i:s');
        //dd($fecha);
        // dd($año);
        return view('paginas.licencias.formulario_enfermedad',compact('año','fecha','hora'));

    }

    public function formulario_altamedica(){
        $añoactual = Carbon::now();
        $año = $añoactual->format('Y');
        $fecha =$añoactual->format('d-m-Y');
        $hora_actual = Carbon::now()->timezone("America/Argentina/Buenos_Aires");
        $hora =$hora_actual->format('H:i:s');
        //dd($fecha);
        // dd($año);
        return view('paginas.licencias.formulario_altamedica',compact('año','fecha','hora'));
    }
}
