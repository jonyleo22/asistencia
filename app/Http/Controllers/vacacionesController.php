<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\legajosModel;
use App\personasModel;
use App\User;
use App\vacacionesModel;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class vacacionesController extends Controller
{
    public function index(){

        if (Auth::User()->roles_id == 1) {

            $id_usuario =Auth::user()->id;

         $datos = personasModel::join('legajos','legajos.id_personas','personas.id')
         ->select('personas.nombre','personas.apellido','legajos.fecha_ingreso',
            'legajos.categoria','personas.id')
    //    ->where('legajos.id_usuario', $id_usuario)
          ->get();
        } else {

            $id_usuario =Auth::user()->id;
            $datos = personasModel::join('legajos','legajos.id_personas','personas.id')
         ->select('personas.nombre','personas.apellido','legajos.fecha_ingreso',
            'legajos.categoria','personas.id')
        ->where('legajos.id_usuario', $id_usuario)
          ->get();
        }




        return view('paginas.vacaciones.index',compact('datos'));
    }

    public function formulario_vacaciones ($id){

        $id_persona = $id;
        $buscar_legajo = legajosModel::where('id_personas', $id)->get();
        $id_usuario = $buscar_legajo[0]->id_usuario;
        return view('paginas.vacaciones.formulario_lar',compact('id_persona','id_usuario'));
    }

    public function registrar_vacaciones (Request $request){

        $ruta = "archivo_vacaciones/".date("Ymdhisv").".".$request->archivo->guessExtension();
            move_uploaded_file($request->archivo, $ruta);


        //     $dato =legajosModel::where('id_personas', $request->id_persona)->get();
        //     $fecha_ingreso = $dato[0]->fecha_ingreso;
        //     $antiguedad = Carbon::parse($fecha_ingreso)->age;

        //     if ($antiguedad < 5) {
        //         $dias_disponible = vacacionesModel::where('id_persona',$request->id_persona)->get()->last();

        //         $disponible =$dias_disponible->dias_disponible;
        //         $actualizar =array(
        //             "dias_disponible" => $disponible + 14
        //          );
        //          $actualizar_dias = vacacionesModel::findOrFail($dias_disponible->id)->update($actualizar);
        //     }

        //     if ($antiguedad > 5 && $antiguedad < 10) {
        //         $dias_disponible = vacacionesModel::where('id_persona',$request->id_persona)->get()->last();

        //         $disponible =$dias_disponible->dias_disponible;
        //         $actualizar =array(
        //             "dias_disponible" => $disponible + 21
        //          );
        //          $actualizar_dias = vacacionesModel::findOrFail($dias_disponible->id)->update($actualizar);
        //     }

        //     if ($antiguedad > 10 && $antiguedad < 20) {
        //         $dias_disponible = vacacionesModel::where('id_persona',$request->id_persona)->get()->last();

        //         $disponible =$dias_disponible->dias_disponible;
        //         $actualizar =array(
        //             "dias_disponible" => $disponible + 28
        //          );
        //          $actualizar_dias = vacacionesModel::findOrFail($dias_disponible->id)->update($actualizar);
        //     }

        //     if ($antiguedad > 20 ) {
        //         $dias_disponible = vacacionesModel::where('id_persona',$request->id_persona)->get()->last();

        //         $disponible =$dias_disponible->dias_disponible;
        //         $actualizar =array(
        //             "dias_disponible" => $disponible + 35
        //          );
        //          $actualizar_dias = vacacionesModel::findOrFail($dias_disponible->id)->update($actualizar);
        //     }


        // $operador = Auth::user()->apellido.' '.Auth::user()->nombre;

        // $fecha = Carbon::now()->timezone("America/Argentina/Buenos_Aires");

        // $año_actual = $fecha->format('Y');


        // $dias_disponible = vacacionesModel::where('id_persona',$request->id_persona)->get()->last();
        // // dd($dias_disponible[0]->dias_disponible);
        // $disponible =$dias_disponible->dias_disponible;
        // $calculo_dias = $disponible - $request->dias_lar;

        // $dato_vacaciones = new vacacionesModel();
        // $dato_vacaciones->id_persona = $request->id_persona;
        // $dato_vacaciones->año_lar = $año_actual;
        // $dato_vacaciones->dias_lar = $request->dias_lar;
        // $dato_vacaciones->dias_disponible =$calculo_dias;
        // $dato_vacaciones->fecha_desde_lar = $request->fecha_desde_lar;
        // $dato_vacaciones->fecha_hasta_lar = $request->fecha_hasta_lar;
        // $dato_vacaciones->observacion_lar = $request->observacion_lar;
        // $dato_vacaciones->operador_lar = $operador;
        // $dato_vacaciones->ruta_lar	= $ruta;
        // $dato_vacaciones->save();

        // $fecha_desde = $request->fecha_desde_lar;
        // $fecha_hasta = $request->fecha_hasta_lar;
        // // tus datos de entrada
        // $start = $fecha_desde;
        // $end   = $fecha_hasta;
        // // generas las fechas entre el periodo
        // $end = new DateTime($end); // éstas 2 lineas son necesarias para que DatePeriod incluya la ultima fecha
        // $end->modify('+ 1 day');
        // $period = new DatePeriod(
        //     new DateTime($start),
        //     new DateInterval('P1D'), $end);

        // // recorres las fechas y haces tu insert

        // $id_usuario = $request->usuario;

        // foreach ($period as $key => $value) {
        //     $date = $value->format('Y-m-d');
        //     // $dia = $date("D");

        //     $dia=date("w", strtotime($date));


        //     if ($dia != 6 && $dia != 0) {
        //         DB::table('asistencias')->insert([
        //             ['estado' => '3', 'id_usuario' => $id_usuario, 'fecha' => $date]
        //         ]);
        //     }


        // }

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


    public function formulariosali_vacaciones ($id){
        $id_persona = $id;
        $buscar_legajo = legajosModel::where('id_personas', $id)->get();
        $id_usuario = $buscar_legajo[0]->id_usuario;
        return view('paginas.vacaciones.salida_lar',compact('id_persona','id_usuario'));
    }

    public function registrarsali_vacaciones (Request $request){

        $ruta = "archivo_vacaciones/".date("Ymdhisv").".".$request->archivo->guessExtension();
            move_uploaded_file($request->archivo, $ruta);

            $operador = Auth::user()->apellido.' '.Auth::user()->nombre;

            $fecha = Carbon::now()->timezone("America/Argentina/Buenos_Aires");

            $año_actual = $fecha->format('Y');

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


            $fecha_desde = $request->fecha_desde_lar;
            $fecha_hasta = $request->fecha_hasta_lar;
            // tus datos de entrada
            $start = $fecha_desde;
            $end   = $fecha_hasta;
            // generas las fechas entre el periodo
            $end = new DateTime($end); // éstas 2 lineas son necesarias para que DatePeriod incluya la ultima fecha
            $end->modify('+ 1 day');
            $period = new DatePeriod(
                new DateTime($start),
                new DateInterval('P1D'), $end);

            // recorres las fechas y haces tu insert

            $id_usuario = $request->usuario;

            foreach ($period as $key => $value) {
                $date = $value->format('Y-m-d');
                // $dia = $date("D");

                $dia=date("w", strtotime($date));


                if ($dia != 6 && $dia != 0) {
                    DB::table('asistencias')->insert([
                        ['estado' => '3', 'id_usuario' => $id_usuario, 'fecha' => $date]
                    ]);
                }


            }

            return redirect('/vacaciones-index')->with('Okey-vacaciones','');


    }

    public function nota_lar(Request $request){
        $date =Carbon::now()->locale('es');
        $fecha_start = Carbon::parse($request->fecha_desde);
        $fecha_end= Carbon::parse($request->fecha_hasta);
        $fecha_desde = $fecha_start->format('d-m-Y');
        $fecha_hasta = $fecha_end->format('d-m-Y');
        $legajo=legajosModel::where('id_usuario', Auth::User()->id)->get();
        $numero_legajo=$legajo[0]->numero_legajo;
        $id_persona=$legajo[0]->id_personas;
        $dias_disponible = vacacionesModel::where('id_persona',$id_persona)->get()
        ->last();
        $dias = $dias_disponible->dias_disponible;
        return view('paginas.vacaciones.nota_lar',compact('date','numero_legajo','dias','fecha_desde','fecha_hasta'));
    }

    public function requisitos_nota(){

        return view('paginas.vacaciones.requisito_nota');

    }
}
