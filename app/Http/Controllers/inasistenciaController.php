<?php

namespace App\Http\Controllers;

use App\asistensiaModel;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Empty_;

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
}
