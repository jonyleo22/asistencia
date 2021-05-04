<?php

namespace App\Http\Controllers;

use App\asistensiaModel;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        // if (!$resultado->isEmpty()) {
        //     $hora_entrada = $resultado[0]->hora_entrada;
        // }

        // estado = 1 para asistencia normal
        // estado = 2 para asistencia justificada
        $justificativo = Auth::User()->justificativo;

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
                if ( $justificativo == 1) {
                    $asistencia->estado = 2;
                }else {
                    $asistencia->estado = 1;
                }
                $asistencia->id_usuario = $id_user;
                $asistencia->fecha = $fecha_actual;
                $asistencia->save();
                return redirect('asistencias-index')->with('okey-asistencia','');
            }else{
                return redirect()->back()->with('error','');
            }
        }

        if ($request->tipo_asistencia == 2)  {
            $buscar_asistencia = asistensiaModel::where('id_usuario', $id_user)->get();
            if ( $buscar_asistencia[0]->fecha == $fecha_actual) {
                if (Hash::check($request->password, $pass_usuario)) {
                $datos = array(
                    "hora_salida" => $hora_actual->format('H:i:s'),
                );

                $guardar_modificacion = asistensiaModel::findOrFail($buscar_asistencia[0]->id)->update($datos);

                return redirect('asistencias-index')->with('okey-salida','');
                }else{
                    return redirect()->back()->with('error','');
                }
            }

        }

    }

    public function informes(Request $request){

        $fecha_desde = $request->fecha_desde;
        $fecha_hasta = $request->fecha_hasta;


    if ($request->fecha_desde && $request->fecha_hasta) {
        $asistencias = User::join('asistencias','asistencias.id_usuario','users.id')
        ->join('sectores_empleados','sectores_empleados.id', 'users.sector_id')
        ->join('cargo_empleado','cargo_empleado.id','users.cargo_id')
        ->whereBetween('asistencias.fecha',[$fecha_desde, $fecha_hasta])
        ->get();
    }

    if ($request->fecha_desde && $request->fecha_hasta && $request->dni) {
        $asistencias = User::join('asistencias','asistencias.id_usuario','users.id')
        ->join('sectores_empleados','sectores_empleados.id', 'users.sector_id')
        ->join('cargo_empleado','cargo_empleado.id','users.cargo_id')
        ->whereBetween('asistencias.fecha',[$fecha_desde, $fecha_hasta])
        ->where('dni_empleado', $request->dni)
        ->get();
    }

    if ($request->fecha_desde == null && $request->fecha_hasta == null  && $request->dni == null) {
        $asistencias = User::join('asistencias','asistencias.id_usuario','users.id')
        ->join('sectores_empleados','sectores_empleados.id', 'users.sector_id')
        ->join('cargo_empleado','cargo_empleado.id','users.cargo_id')
        ->whereBetween('asistencias.fecha',[$fecha_desde, $fecha_hasta])
        ->get();
    }
    return view('paginas.asistencias.informe',compact('asistencias'));

}
   public function informe_ifai(){

    $usuario = User::join('asistencias','asistencias.id_usuario','users.id')
    ->select('users.apellido','users.nombre')
    ->select('asistencias.estado.count(*)')
    ->get();




    dd($usuario);

    return view('paginas.asistencias.informe_ifai', compact('usuario'));


    }
}

