<?php

namespace App\Http\Controllers;

use App\legajosModel;
use Illuminate\Http\Request;

class vacacionesController extends Controller
{
    public function index($id){
        $vacaciones = legajosModel::join('vacaciones','vacaciones.id_legajo','legajos.id')
        ->where('vacaciones.id_legajo',$id)
        ->get();
        dd($vacaciones[0]->dias_disponible);


        return view('paginas.vacaciones.index');
    }
}
