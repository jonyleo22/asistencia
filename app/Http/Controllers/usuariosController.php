<?php

namespace App\Http\Controllers;

use App\rolesModel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        //METODO DE REGUISTRO 1
        // $registro = new User();
        // $registro->username = $request->username;
        // $registro->nombre = $request->nombre;
        // $registro->apellido = $request->apellido;
        // $registro->email = $request->email;
        // $registro->password = $request->password;
        // $registro->roles_id = $request->roles_id;
        //  dd($request->all());

        // $registro->save();

        User::create([
            'username'=>$request->username,
            'nombre'=>$request->nombre,
            'apellido'=>$request->apellido,
            'email'=>$request->email,
            'password' => Hash::make($request->password),
            'roles_id' =>$request->roles_id
         ]);


        return redirect('/usuarios')->with('ok','');

     }
}
