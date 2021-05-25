<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class legajosController extends Controller
{
    public function index(){

        return view('paginas.legajos.index');
    }

    public function formulario_legajo(){

        return view('paginas.legajos.formulario_legajo');
    }
}
