<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class licenciaController extends Controller
{
    public function index(){
        return view('paginas.licencias.index');
    }

    public function formulario_maternidad(){
        return view('paginas.licencias.formulario_maternidad');
    }

    public function formulario_enfermedad(){
        return view('paginas.licencias.formulario_enfermedad');
    }

    public function formulario_altamedica(){
        return view('paginas.licencias.formulario_altamedica');
    }
}
