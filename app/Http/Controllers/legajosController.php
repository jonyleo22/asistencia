<?php

namespace App\Http\Controllers;

use App\domicilioPersonasModel;
use App\estadoCivilModel;
use App\legajosModel;
use App\localidadesModel;
use App\ocupacionPersonasModel;
use App\personasModel;
use App\provinciasModel;
use App\sexoModel;
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
        $sexo = sexoModel::all();
        return view('paginas.legajos.formulario_legajo',compact('tipo_documento','usuarios','provincias','localidades','estado_civil','sexo'));
    }

    public function legajo_registro(Request $request){


        // $validatedData = $request->validate([
        //     'nombre' => ['required'],
        //     'apellido' => ['required'],
        //     'fecha_ingreso' =>['required'],
        //     'tipo_dni_id'=>['required'],
        //     'dni'=>['required'],
        //     'email' => ['required'],
        //     'fecha_nacimiento' =>['required'],
        //     'domicilio'=>['required'],
        //     'telefono'=>['required'],
        //     'numero_legajo'=>['required'],
        //     'categoria'=>['required'],
        //     'id_usuario'=>['required'],
        // ]);
        //calcular Fecha de nacimineto
         $fecha = Carbon::now();

        $fecha_nacimiento = $request->fecha_nacimiento;
        $edad = Carbon::parse($fecha_nacimiento)->age;
        //-----------------------------------------------
        //registrar personas
        $personas = new personasModel();
        $personas->nombre = $request->nombre;
        $personas->apellido = $request->apellido;
        $personas->tipo_dni_id = $request->tipo_dni_id;
        $personas->dni = $request->dni;
        $personas->fecha_nacimiento = $request->fecha_nacimiento;
        $personas->edad= $edad;
        $personas->nacionalidad = $request->nacionalidad;
        $personas->provincia_id = $request->provincia_id;
        $personas->localidad_id = $request->localidad_id;
        $personas->id_estado_civil= $request->id_estado_civil;
        $personas->telefono= $request->telefono;
        $personas->email= $request->email;
        $personas->sexo_id=$request->sexo_id;
        $personas->save();
        $id_persona=$personas->id;  //capturamos el id de la ultima persona registrada

        //registrar domicilio
        $domicilio = new domicilioPersonasModel();
        $domicilio->descripcion_domicilio =$request->descripcion_domicilio;
        $domicilio->id_persona =$id_persona;
        $domicilio->save();


        //registrar ocupacion
        $ocupacion = new ocupacionPersonasModel();
        $ocupacion->descripcion_ocupacion =$request->descripcion_ocupacion;
        $ocupacion->id_persona =$id_persona;
        $ocupacion->save();
        return "registre persona  domicilio y ocupacion";







    }

    public function datos_familia(){
        return redirect('/legajos-index');

    }
    public function datos_hijos(){
        return redirect('/legajos-index')->with('okey-registro','');

    }
}
