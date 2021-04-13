<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class usuariosController extends Controller
{
    public function index ()    {
        return view('paginas.usuarios.index');

    }
    public function formulario(){
        return view('paginas.usuarios.formulario_usuario');


    }
}
