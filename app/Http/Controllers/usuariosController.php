<?php

namespace App\Http\Controllers;

use App\CargoModel;
use App\rolesModel;
use App\SectoresModel;
use App\TipoDocumentoModel;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class usuariosController extends Controller
{
    public function index ()    {

        // $usuarios =User::all();

        $usuarios = User::join('sectores_empleados', 'sectores_empleados.id', 'users.sector_id')
        ->join('cargo_empleado','cargo_empleado.id','users.cargo_id')
        ->join('roles','roles.id','users.roles_id')
        ->select('users.*','sectores_empleados.*','cargo_empleado.*','roles.*')
        ->get();

        return view('paginas.usuarios.index',compact('usuarios'));

    }
    public function formulario(){
        $roles =rolesModel::all();
        $tipo_documento = TipoDocumentoModel::all();
        $sectores = SectoresModel::all();
        $cargo = CargoModel::all();
        //dd($fecha_nacimiento);

        return view('paginas.usuarios.formulario_usuario',compact('roles','tipo_documento','sectores','cargo'));


    }

    public function registrar_usuario(Request $request){

        // dd($request->all());

        $validarDatos = $request->validate([
            'username' => ['required', 'unique:users'],
            'numero_legajo' => ['required','unique:users'],
            'categoria' => ['required'],
            'nombre' => ['required'],
            'apellido' => ['required'],
            'fecha_nacimiento' => ['required'],
            'direccion_empleado' => ['required'],
            'telefono_empleado' => ['required'],
            'tipo_dni_id' => ['required'],
            'dni_empleado' => ['required'],
            'email' => ['required'],
            'sector_id' => ['required'],
            'cargo_id' => ['required'],
            'password' => ['required'],
            'roles_id' => ['required'],
            'justificativo' => ['required'],
            'fecha_ingreso_empleado' => ['required'],
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

        $fecha = Carbon::now();

        $fecha_nacimiento = $request->fecha_nacimiento;
        $edad = Carbon::parse($fecha_nacimiento)->age;



        User::create([
            'username'=>$request->username,
            'numero_legajo'=>$request->numero_legajo,
            'categoria'=>$request->categoria,
            'nombre'=>$request->nombre,
            'apellido'=>$request->apellido,
            'edad' =>$edad,
            'fecha_nacimiento'=>$request->fecha_nacimiento,
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
      public function mostrar_edicion_usuario($id){
        $roles =rolesModel::all();
        $tipo_documento = TipoDocumentoModel::all();
        $sectores = SectoresModel::all();
        $cargo = CargoModel::all();
        $datos_usuario = User::findOrFail($id);

        return view('paginas.usuarios.editar_usuario', compact('roles','tipo_documento','sectores','cargo','datos_usuario'));
      }
}
