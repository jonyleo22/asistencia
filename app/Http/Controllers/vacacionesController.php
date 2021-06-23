<?php

namespace App\Http\Controllers;

use App\legajosModel;
use App\personasModel;
use App\vacacionesModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class vacacionesController extends Controller
{
    public function index(){
        $datos = personasModel::join('legajos','legajos.id_personas','personas.id')
         ->select('personas.nombre','personas.apellido','legajos.fecha_ingreso',
       'legajos.categoria','personas.id')
        ->get();

        return view('paginas.vacaciones.index',compact('datos'));
    }

    public function formulario_vacaciones ($id){

        $id_persona = $id;

        return view('paginas.vacaciones.formulario_lar',compact('id_persona'));
    }

    public function registrar_vacaciones (Request $request){

        $ruta = "archivo_vacaciones/".date("Ymdhisv").".".$request->archivo->guessExtension();
            move_uploaded_file($request->archivo, $ruta);

        $operador = Auth::user()->apellido.' '.Auth::user()->nombre;

        $fecha = Carbon::now()->timezone("America/Argentina/Buenos_Aires");

        $año_actual = $fecha->format('Y');

        $dato_vacaciones = new vacacionesModel();
        $dato_vacaciones->id_persona = $request->id_persona;
        $dato_vacaciones->año_lar = $año_actual;
        $dato_vacaciones->dias_lar = $request->dias_lar;
        $dato_vacaciones->fecha_desde_lar = $request->fecha_desde_lar;
        $dato_vacaciones->fecha_hasta_lar = $request->fecha_hasta_lar;
        $dato_vacaciones->observacion_lar = $request->observacion_lar;
        $dato_vacaciones->operador_lar = $operador;
        $dato_vacaciones->ruta_lar	= $ruta;
        $dato_vacaciones->save();
        return redirect('/vacaciones-index')->with('Okey-vacaciones','');







        dd($request->all());

    }
}
