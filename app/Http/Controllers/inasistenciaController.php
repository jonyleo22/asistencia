<?php

namespace App\Http\Controllers;

use App\asistensiaModel;
use App\AusenteAvisoModel;
use App\legajosModel;
use App\personasModel;
use App\User;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class inasistenciaController extends Controller
{
    public function index(){
        $fecha = Carbon::now()->timezone("America/Argentina/Buenos_Aires");
        $fecha_actual = $fecha->format('Y-m-d');
        $presentes = asistensiaModel::join('users','users.id','asistencias.id_usuario')
        ->select('users.id','asistencias.id_usuario','users.nombre','users.apellido','asistencias.estado')
        ->where('asistencias.fecha', $fecha_actual)
        ->where('asistencias.estado', 1)
        ->orwhere('asistencias.estado', 2)
        ->where('asistencias.fecha', $fecha_actual)
        ->orwhere('asistencias.estado', 3)
        ->where('asistencias.fecha', $fecha_actual)
        ->orwhere('asistencias.estado', 4)
        ->where('asistencias.fecha', $fecha_actual)
        ->orwhere('asistencias.estado', 5)
        ->where('asistencias.fecha', $fecha_actual)
        ->get();

        return view('paginas.inasistencia.index',compact('presentes'));
    }

    public function registrar_inasistencias(Request $request){
        $users = User::all();
        $contar_presentes = 0;
        $contar_ausentes= 0;
        $fecha = Carbon::now()->timezone("America/Argentina/Buenos_Aires");
        $fecha_actual = $fecha->format('Y-m-d');
        foreach ($users as $element) {
            $datos = User::join('asistencias', 'asistencias.id_usuario', 'users.id')
            ->where('asistencias.id_usuario', $element->id)
            ->where('asistencias.fecha', $fecha_actual)
            ->get();

            // echo '<pre>'; print_r($datos); echo '</pre>';

            if (empty($datos[0])) {

                    DB::table('asistencias')->insert([
                        ['estado' => '2', 'id_usuario' => $element->id, 'fecha' => $fecha_actual]
                    ]);

              $contar_ausentes++;
            } else {
                $contar_presentes++;
            }

        }

        return redirect('/inasistencia-index')->with('ok-inasistencias','');
        // dd($contar_ausentes, $contar_presentes);

    }

    //ausentes con aviso

    public function dni_ausente_aviso_nota(){

    return view('paginas.inasistencia.buscar_dni');
    }

    public function dni_form_ausente_aviso(Request $request){
        $motivo = Str::upper($request->motivo);
        $dni = $request->dni;
        $añoactual = Carbon::now();
        $año = $añoactual->format('Y');
        $fecha = $añoactual->format('d-m-Y');
        $hora_actual = Carbon::now()->timezone("America/Argentina/Buenos_Aires");
        $hora = $hora_actual->format('H:i:s');
        $validardni = personasModel::where('dni', $dni)->get();
        $nombre = Str::upper($validardni[0]->apellido);
        $apellido = Str::upper($validardni[0]->nombre);
        if (count($validardni) > 0) {
            $id_persona = $validardni[0]->id;
            $categoria =legajosModel::where('id_personas',$id_persona)->get();
            $id_usuario = $categoria[0]->id_usuario;

                return view('paginas.inasistencia.nota_ausente_aviso',compact('dni','hora','fecha','año','nombre','apellido','categoria','id_usuario','motivo'));
        }else {
            return redirect()->back()->with('No-Existe', '');
        }

    }


    //index ausente con aviso
    public function index_ausente_aviso(){

        $datos = AusenteAvisoModel::all();



        return view('paginas.inasistencia.ausentes_aviso_index', compact('datos'));
    }

    public function buscar_dni_ausente_aviso(){

        return view('paginas.inasistencia.buscar_dni_alta_ausente_aviso');

    }

    public function form_registrar_ausente_aviso(Request $request){
        $dni = $request->dni;
        $añoactual = Carbon::now();
        $año = $añoactual->format('Y');
        $fecha = $añoactual->format('d-m-Y');
        $hora_actual = Carbon::now()->timezone("America/Argentina/Buenos_Aires");
        $hora = $hora_actual->format('H:i:s');
        $validardni = personasModel::where('dni', $dni)->get();
        if (count($validardni) > 0) {
            $id_persona = $validardni[0]->id;
            $categoria =legajosModel::where('id_personas',$id_persona)->get();
            $id_usuario = $categoria[0]->id_usuario;

                return view('paginas.inasistencia.form_alta_ausente_aviso',compact('dni','hora','fecha','año','validardni','categoria','id_usuario','id_persona'));
        }else {
            return redirect()->back()->with('No-Existe', '');
        }

    }

    // public function form_registrar_ausente($id_usuario){
    //     return view('paginas.inasistencia.form_alta_ausente_aviso');
    // }

    public function registrar_ausente_aviso(Request $request){


        $ruta = "ausente_con_aviso/".date("Ymdhisv").".".$request->archivo->guessExtension();
        move_uploaded_file($request->archivo, $ruta);

        $ausentes = new AusenteAvisoModel();
        $ausentes->id_usuario = $request->id_usuario;
        $ausentes->ruta_ausente_aviso = $ruta;
        $ausentes->save();

        $fecha_desde = $request->fecha_desde;
        $fecha_hasta = $request->fecha_hasta;
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

        $id_usuario = $request->id_usuario;

        foreach ($period as $key => $value) {
            $date = $value->format('Y-m-d');
            // $dia = $date("D");

            $dia=date("w", strtotime($date));

            if ($dia != 6 && $dia != 0) {
                DB::table('asistencias')->insert([
                    ['estado' => '5', 'id_usuario' => $id_usuario, 'fecha' => $date]
                ]);
            }


        }

        return redirect('/index-ausente-aviso')->with('ok-ausente','');
    }

}
