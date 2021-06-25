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


            $dato =legajosModel::where('id_personas', $request->id_persona)->get();
            $fecha_ingreso = $dato[0]->fecha_ingreso;
            $antiguedad = Carbon::parse($fecha_ingreso)->age;

            if ($antiguedad < 5) {
                $dias_disponible = vacacionesModel::where('id_persona',$request->id_persona)->get()->last();

                $disponible =$dias_disponible->dias_disponible;
                $actualizar =array(
                    "dias_disponible" => $disponible + 14
                 );
                 $actualizar_dias = vacacionesModel::findOrFail($dias_disponible->id)->update($actualizar);
            }

            if ($antiguedad > 5 && $antiguedad < 10) {
                $dias_disponible = vacacionesModel::where('id_persona',$request->id_persona)->get()->last();

                $disponible =$dias_disponible->dias_disponible;
                $actualizar =array(
                    "dias_disponible" => $disponible + 21
                 );
                 $actualizar_dias = vacacionesModel::findOrFail($dias_disponible->id)->update($actualizar);
            }

            if ($antiguedad > 10 && $antiguedad < 20) {
                $dias_disponible = vacacionesModel::where('id_persona',$request->id_persona)->get()->last();

                $disponible =$dias_disponible->dias_disponible;
                $actualizar =array(
                    "dias_disponible" => $disponible + 28
                 );
                 $actualizar_dias = vacacionesModel::findOrFail($dias_disponible->id)->update($actualizar);
            }

            if ($antiguedad > 20 ) {
                $dias_disponible = vacacionesModel::where('id_persona',$request->id_persona)->get()->last();

                $disponible =$dias_disponible->dias_disponible;
                $actualizar =array(
                    "dias_disponible" => $disponible + 35
                 );
                 $actualizar_dias = vacacionesModel::findOrFail($dias_disponible->id)->update($actualizar);
            }


        $operador = Auth::user()->apellido.' '.Auth::user()->nombre;

        $fecha = Carbon::now()->timezone("America/Argentina/Buenos_Aires");

        $año_actual = $fecha->format('Y');

//-
        $dias_disponible = vacacionesModel::where('id_persona',$request->id_persona)->get()->last();
        // dd($dias_disponible[0]->dias_disponible);
        $disponible =$dias_disponible->dias_disponible;
        $calculo_dias = $disponible - $request->dias_lar;





        $dato_vacaciones = new vacacionesModel();
        $dato_vacaciones->id_persona = $request->id_persona;
        $dato_vacaciones->año_lar = $año_actual;
        $dato_vacaciones->dias_lar = $request->dias_lar;
        $dato_vacaciones->dias_disponible =$calculo_dias;
        $dato_vacaciones->fecha_desde_lar = $request->fecha_desde_lar;
        $dato_vacaciones->fecha_hasta_lar = $request->fecha_hasta_lar;
        $dato_vacaciones->observacion_lar = $request->observacion_lar;
        $dato_vacaciones->operador_lar = $operador;
        $dato_vacaciones->ruta_lar	= $ruta;
        $dato_vacaciones->save();
        return redirect('/vacaciones-index')->with('Okey-vacaciones','');

    }

    public function historial_vacaciones($id){
        $datos = personasModel::join('legajos','legajos.id_personas','personas.id')
        ->select('personas.nombre','personas.apellido','legajos.fecha_ingreso',
      'legajos.categoria','personas.id')
       ->get();
       $vacaciones = vacacionesModel::where('id_persona',$id)->get();


        return view('paginas.vacaciones.historial',compact('datos','vacaciones'));


    }
}
