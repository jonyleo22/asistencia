<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class licenciaController extends Controller
{
    public function index(){
        return view('paginas.licencias.index');
    }

    public function formulario_maternidad(){
        $añoactual = Carbon::now();
        $año = $añoactual->format('Y');
        $fecha =$añoactual->format('d-m-Y');
        $hora_actual = Carbon::now()->timezone("America/Argentina/Buenos_Aires");
        $hora =$hora_actual->format('H:i:s');
        //dd($fecha);
        // dd($año);
        return view('paginas.licencias.formulario_maternidad',compact('año','fecha','hora'));

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
