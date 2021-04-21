<?php

namespace App\Http\Controllers;

use App\asistensiaModel;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class asistenciaController extends Controller
{
    public function index(){

        return view('paginas.asistencias.index');
    }
    public function registrar_asistencia(Request $request){
        // dd($request->all());

        $dni = $request->dni;
        $buscardni = User::where('dni_empleado','=',$dni)->get();
        $fecha = Carbon::now()->timezone("America/Argentina/Buenos_Aires");
        $fecha_actual = $fecha->format('Y-m-d');



        // dd($buscardni[0]->id);

        $hora_actual = Carbon::now()->timezone("America/Argentina/Buenos_Aires");
        if ($buscardni && $request->tipo_asistencia == 1)  {
            $asistencia = new asistensiaModel();
            $asistencia->tipo_asistencia = $request->tipo_asistencia;
            $asistencia->hora_entrada = $hora_actual->format('H:i:s');
            $asistencia->estado = 1;
            $asistencia->id_usuario = $buscardni[0]->id;
            $asistencia->fecha = $fecha_actual;
            $asistencia->save();
            return redirect('asistencias-index')->with('okey-asistencia','');
        }

        if ($buscardni && $request->tipo_asistencia == 2)  {

            if ($buscardni[0]->fecha == $fecha_actual) {
                $buscar_asistencia = asistensiaModel::where('id_usuario', $buscardni[0]->id)->get();
                dd($buscar_asistencia);
                $datos = array(

                    "fecha_salida" => $hora_actual->format('H:i:s'),

                );
                $guardar_modificacion = asistensiaModel::findOrFail($buscar_asistencia->id)->update($datos);
                return redirect('asistencias-index')->with('okey-salida','');
            }

        }

    }


}

