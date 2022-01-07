<?php

namespace App\Http\Controllers;

use App\asistensiaModel;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class asistenciaController extends Controller
{
    public function index(){
        $fecha = Carbon::now()->timezone("America/Argentina/Buenos_Aires");
        $fecha_actual = $fecha->format('Y-m-d');
        $id_user = Auth::User()->id;

        $resultado = asistensiaModel::where('id_usuario',  $id_user)
        ->where('fecha', $fecha_actual )
        ->get();

        $existencia_entrada = asistensiaModel::where('id_usuario',  $id_user)
        ->where('fecha', $fecha_actual )
        ->where('hora_entrada', '!=', null)
        ->get();

        return view('paginas.asistencias.index',compact('resultado','existencia_entrada'));
    }

    public function registrar_asistencia(Request $request){

        $dni = $request->dni;
        // $buscardni = User::where('dni_empleado','=',$dni)->get();
        $fecha = Carbon::now()->timezone("America/Argentina/Buenos_Aires");
        $fecha_actual = $fecha->format('Y-m-d');
        $id_user = Auth::User()->id;
        $pass_usuario = Auth::User()->password;

        $hora_actual = Carbon::now()->timezone("America/Argentina/Buenos_Aires");

        // validar que ya exista la entrada y la salida

        $existencia_entrada = asistensiaModel::where('id_usuario',  $id_user)
        ->where('fecha', $fecha_actual )
        ->where('hora_entrada', '!=', null)
        ->get();

        if ($request->tipo_asistencia == 1) {
            if (Hash::check($request->password, $pass_usuario)) {
                if (!$existencia_entrada->isEmpty()) {
                    return redirect()->back()->with('error1','');
                }
            }
        }

        if ($request->tipo_asistencia == 1) {
            if (Hash::check($request->password, $pass_usuario)) {
                $asistencia = new asistensiaModel();
                $asistencia->hora_entrada = $hora_actual->format('H:i:s');
                $asistencia->id_usuario = $id_user;
                $asistencia->estado = 1;
                $asistencia->fecha = $fecha_actual;
                $asistencia->save();
                return redirect('asistencias-index')->with('okey-asistencia','');
            }else{
                return redirect()->back()->with('error','');
            }
        }

        if ($request->tipo_asistencia == 2)  {
            $buscar_asistencia = asistensiaModel::where('id_usuario', $id_user)->get()->last();
            if ( $buscar_asistencia->fecha == $fecha_actual) {
                if (Hash::check($request->password, $pass_usuario)) {
                    $datos = array(
                    "hora_salida" => $hora_actual->format('H:i:s'),
                );

                $guardar_modificacion = asistensiaModel::findOrFail($buscar_asistencia->id)->update($datos);

                return redirect()->back()->with('okey-salida','');
                }else{
                    return redirect()->back()->with('error','');
                }
            }

        }

    }
    public function informes(Request $request){

        $fecha = Carbon::now()->timezone("America/Argentina/Buenos_Aires");
        $fecha_actual = $fecha->format('Y-m-d');
        $fecha_desde = $request->fecha_desde;
        $fecha_hasta = $request->fecha_hasta;

        // dd($request->all());

        if ($request->fecha_desde == null && $request->fecha_hasta == null && $request->dni == null) {
            $asistencia = asistensiaModel::join('users', 'users.id', 'asistencias.id_usuario')
            ->where('asistencias.fecha', $fecha_actual)
            ->select('users.nombre','users.apellido','users.dni_empleado', 'asistencias.id', 'asistencias.hora_entrada'
            ,'asistencias.hora_salida','asistencias.fecha','asistencias.observacion_asistencia', 'asistencias.estado')
            ->orderBy('asistencias.id','DESC')
            ->get();
        }

        if ($request->fecha_desde != null && $request->fecha_hasta != null && $request->dni == null ) {
            $asistencia = asistensiaModel::join('users', 'users.id', 'asistencias.id_usuario')
        ->whereBetween('asistencias.fecha',[$fecha_desde, $fecha_hasta])
        ->select('users.nombre','users.apellido','users.dni_empleado', 'asistencias.id', 'asistencias.hora_entrada'
        ,'asistencias.hora_salida','asistencias.fecha','asistencias.observacion_asistencia', 'asistencias.estado')
        ->get();
        }


        if ($request->fecha_desde != null && $request->fecha_hasta != null && $request->dni != null ) {
            $asistencia = asistensiaModel::join('users', 'users.id', 'asistencias.id_usuario')
        ->where('users.dni_empleado', $request->dni)
        ->whereBetween('asistencias.fecha',[$fecha_desde, $fecha_hasta])
        ->select('users.nombre','users.apellido','users.dni_empleado', 'asistencias.id', 'asistencias.hora_entrada'
        ,'asistencias.hora_salida','asistencias.fecha','asistencias.observacion_asistencia', 'asistencias.estado')
        ->get();
        }


    return view('paginas.asistencias.informe',compact('asistencia'));

}

    public function formulario_observacion($id){

        $id_asistencia = $id;
        return view('paginas.asistencias.formulario_observacion', compact('id_asistencia'));
    }

    public function registrar_observacion(Request $request){

       $data = array(
           'observacion_asistencia' => $request->observacion_asistencia
       );
       $actualizar_observacion = asistensiaModel::findOrFail($request->id_asistencia)->update($data);

       return redirect('/informes')->with('ok-obs', '');

    }

    public function informe_siap(Request $request){

        $fecha_desde = $request->fecha_desde;
        $fecha_hasta = $request->fecha_hasta;

        // session(['fecha_desde' => $fecha_desde]);
        // session(['fecha_hasta' => $fecha_hasta]);


        // echo '<pre>'; print_r($usuarios); echo '</pre>';
        // return;
        return view('paginas.asistencias.informe_siap');

}

    public function lista_siap(Request $request){

        // dd($request->all());
        $fecha_desde = $request->fecha_desde;
        $fecha_hasta = $request->fecha_hasta;

        $usuarios = DB::table('users')
        ->join('asistencias', 'asistencias.id_usuario', 'users.id')
        ->select('users.id', 'users.nombre', 'users.apellido')
        ->whereBetween('asistencias.fecha', [$fecha_desde, $fecha_hasta])
        ->groupBy('users.id')
        ->get();


    return view('paginas.asistencias.lista_siap', compact('usuarios','fecha_desde','fecha_hasta'));

    }

}
