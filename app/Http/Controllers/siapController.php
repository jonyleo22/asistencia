<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class siapController extends Controller
{
    public function index(){

        return view('paginas.siap.index');
    }

    public function lista_siap_mes(Request $request){

        $fecha_desde = $request->fecha_desde;
            $fecha_hasta = $request->fecha_hasta;


            // $fechaantigua = Carbon::parse($fecha_desde);
            // $fechanueva = Carbon::parse($fecha_hasta);
            // $dias = $fechaantigua->diffInDays($fechanueva);
            // dd($dias + 1);


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

            // foreach ($period as $element ) {
            //     $date = $element->format('Y-m-d');
            //     // $dia = $date("D");

            //     $dia=date("w", strtotime($date));

            //     dd($element);

            // }
            $fechas = DB::table('users')
        ->join('asistencias', 'asistencias.id_usuario', 'users.id')
        ->select( 'asistencias.fecha')
        ->whereBetween('asistencias.fecha', [$fecha_desde, $fecha_hasta])
        ->groupBy('asistencias.fecha')
        ->get();

        $usuarios = DB::table('users')
        ->join('asistencias', 'asistencias.id_usuario', 'users.id')
        ->select('users.id', 'users.nombre', 'users.apellido')
        ->whereBetween('asistencias.fecha', [$fecha_desde, $fecha_hasta])
        ->groupBy('users.id')
        ->get();




                return view('paginas.siap.lista_siap',compact('period','fechas','usuarios','fecha_desde','fecha_hasta'));

    }
}
