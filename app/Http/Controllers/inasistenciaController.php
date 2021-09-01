<?php

namespace App\Http\Controllers;

use App\asistensiaModel;
use App\legajosModel;
use App\personasModel;
use App\User;
use Carbon\Carbon;
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

    public function dni_ausente_aviso(){

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
        if (count($validardni) > 0) {
            $id_persona = $validardni[0]->id;
            $categoria =legajosModel::where('id_personas',$id_persona)->get();
            $id_usuario = $categoria[0]->id_usuario;

                return view('paginas.inasistencia.nota_ausente_aviso',compact('dni','hora','fecha','año','validardni','categoria','id_usuario','motivo'));
        }else {
            return redirect()->back()->with('No-Existe', '');
        }

    }


    public function index_ausente_aviso(){

        return view('paginas.inasistencia.ausentes_aviso_index');
    }
}
