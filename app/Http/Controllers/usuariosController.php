<?php

namespace App\Http\Controllers;

use App\CargoModel;
use App\rolesModel;
use App\SectoresModel;
use App\TipoDocumentoModel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class usuariosController extends Controller
{
    public function index ()    {
        $usuarios =User::all();
        return view('paginas.usuarios.index',compact('usuarios'));

    }
    public function formulario(){
        $roles =rolesModel::all();
        $tipo_documento = TipoDocumentoModel::all();
        $sectores = SectoresModel::all();
        $cargo = CargoModel::all();
        return view('paginas.usuarios.formulario_usuario',compact('roles','tipo_documento','sectores','cargo'));


    }

    public function registrar_usuario(Request $request){

        $validarDatos = $request->validate([
            'justificacion' => ['required'],
        ]);

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

        // dd($request->all());

        User::create([
            'username'=>$request->username,
            'nombre'=>$request->nombre,
            'apellido'=>$request->apellido,
            'direccion_empleado' =>$request->direccion_empleado,
            'telefono_empleado' =>$request->telefono_empleado,
            'tipo_dni_id' =>$request->tipo_dni_id,
            'dni_empleado'=>$request->dni_empleado,
            'email'=>$request->email,
            'fecha_ingreso_empleado'=>$request->fecha_ingreso_empleado,
            'sector_id'=>$request->sector_id,
            'cargo_id'=>$request->cargo_id,
            'password' => Hash::make($request->password),
            'roles_id' =>$request->roles_id,
            'justificativo' =>$request->justificativo,
         ]);


        return redirect('/usuarios')->with('ok','');

     }
}
