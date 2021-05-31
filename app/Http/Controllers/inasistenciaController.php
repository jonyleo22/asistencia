<?php

namespace App\Http\Controllers;

use App\asistensiaModel;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class inasistenciaController extends Controller
{
    public function index(){
        $fecha = Carbon::now()->timezone("America/Argentina/Buenos_Aires");
        $fecha_actual = $fecha->format('Y-m-d');
        $presentes = asistensiaModel::join('users','users.id','asistencias.id_usuario')
        ->select('users.nombre','users.apellido','asistencias.estado')
        ->where('asistencias.estado', 1)
        ->where('fecha', $fecha_actual)
        ->get();
        $usuarios = User::all();
        foreach ($usuarios as $element) {

        }
        return view('paginas.inasistencia.index',compact('presentes'));
    }
}
