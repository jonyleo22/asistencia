<?php

namespace App\Http\Controllers;

use App\estadoCivilModel;
use App\legajosModel;
use App\localidadesModel;
use App\provinciasModel;
use App\TipoDocumentoModel;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class legajosController extends Controller
{
    public function index(){
        $legajo = legajosModel::all();

        return view('paginas.legajos.index', compact('legajo'));
    }

    public function formulario_legajo(){
        $tipo_documento = TipoDocumentoModel::all();
        $provincias =provinciasModel::all();
        $localidades =localidadesModel::all();
        $estado_civil=estadoCivilModel::all();
        $usuarios = User::all();
        return view('paginas.legajos.formulario_legajo',compact('tipo_documento','usuarios','provincias','localidades','estado_civil'));
    }

    public function legajo_registro(Request $request){


        $validatedData = $request->validate([
            'nombre' => ['required'],
            'apellido' => ['required'],
            'fecha_ingreso' =>['required'],
            'tipo_dni_id'=>['required'],
            'dni'=>['required'],
            'email' => ['required'],
            'fecha_nacimiento' =>['required'],
            'domicilio'=>['required'],
            'telefono'=>['required'],
            'numero_legajo'=>['required'],
            'categoria'=>['required'],
            'id_usuario'=>['required'],
        ]);
         $fecha = Carbon::now();

        $fecha_nacimiento = $request->fecha_nacimiento;
        $edad = Carbon::parse($fecha_nacimiento)->age;

        $datos_formulario = new legajosModel();
        $datos_formulario->nombre = $request->nombre;
        $datos_formulario->apellido = $request->apellido;
        $datos_formulario->fecha_ingreso = $request->fecha_ingreso;
        $datos_formulario->tipo_dni_id = $request->tipo_dni_id;
        $datos_formulario->dni = $request->dni;
        $datos_formulario->email = $request->email;
        $datos_formulario->fecha_nacimiento = $request->fecha_nacimiento;
        $datos_formulario->edad = $edad;
        $datos_formulario->domicilio = $request->domicilio;
        $datos_formulario->telefono = $request->telefono;
        $datos_formulario->numero_legajo = $request->numero_legajo;
        $datos_formulario->categoria = $request->categoria;
        $datos_formulario->id_usuario = $request->id_usuario;

        $datos_formulario->save();
        return redirect('/legajos-index')->with('okey-registro','');

    }

    public function datos_familia(){
        return redirect('/legajos-index');

    }
    public function datos_hijos(){
        return redirect('/legajos-index')->with('okey-registro','');

    }
}
