<?php

namespace App\Http\Controllers;

use App\rolesModel;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class usuariosController extends Controller
{
    public function index ()    {
        return view('paginas.usuarios.index');

    }
    public function formulario(){
        $roles =rolesModel::all();
        return view('paginas.usuarios.formulario_usuario',compact('roles'));


    }

    public function registrar_usuario(Request $request){

        $registro = new User();
        $registro->name = $request->name;
        $registro->nombre = $request->nombre;
        $registro->apellido = $request->apellido;
        $registro->email = $request->email;
        $registro->password = $request->password;
        $registro->roles_id = $request->roles_id;

        $registro->save();

     }
}
