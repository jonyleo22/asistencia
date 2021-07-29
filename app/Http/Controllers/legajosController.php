<?php

namespace App\Http\Controllers;

use App\CargoModel;
use App\domicilioPersonasModel;
use App\estadoCivilModel;
use App\legajosModel;
use App\localidadesModel;
use App\ocupacionPersonasModel;
use App\personasFamiliaModel;
use App\personasModel;
use App\provinciasModel;
use App\sexoModel;
use App\TipoDocumentoModel;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class legajosController extends Controller
{
    public function index(){


        if (Auth::User()->roles_id == 3) {

            $id_usuario = Auth::User()->id;

            $datos = personasModel::join('legajos','legajos.id_personas','personas.id')
            ->join('domicilio_personas','domicilio_personas.id_persona','personas.id')
            ->select('personas.nombre','personas.apellido','legajos.fecha_ingreso','personas.dni'
            ,'personas.email','personas.fecha_nacimiento','personas.edad','personas.telefono',
            'legajos.numero_legajo','legajos.categoria','domicilio_personas.descripcion_domicilio',
            'personas.id','legajos.id_usuario')
            ->where('legajos.id_usuario', $id_usuario)
            ->get();

        } else {

            $datos = personasModel::join('legajos','legajos.id_personas','personas.id')
            ->join('domicilio_personas','domicilio_personas.id_persona','personas.id')
            ->select('personas.nombre','personas.apellido','legajos.fecha_ingreso','personas.dni'
            ,'personas.email','personas.fecha_nacimiento','personas.edad','personas.telefono',
            'legajos.numero_legajo','legajos.categoria','domicilio_personas.descripcion_domicilio',
            'personas.id','legajos.id_usuario')
            ->get();
        }

        return view('paginas.legajos.index', compact('datos'));
    }

    public function formulario_legajo(){
        $tipo_documento = TipoDocumentoModel::all();
        $provincias =provinciasModel::all();
        $localidades =localidadesModel::all();
        $estado_civil=estadoCivilModel::all();
        $usuarios = User::all();
        $sexo = sexoModel::all();
        $cargo = CargoModel::all();



        return view('paginas.legajos.formulario_legajo',compact('tipo_documento','usuarios','provincias','localidades','estado_civil','sexo','cargo'));
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
        $operador = Auth::user()->apellido.' '.Auth::user()->nombre;




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


        //Registrar Datos familia
        $familia = new personasFamiliaModel();
        $familia->apellido_padre =$request->apellido_padre;
        $familia->nombre_padre =$request->nombre_padre;
        $familia->fecha_nacimiento_padre =$request->fecha_nacimiento_padre;
        $familia->nacionalidad_padre =$request->nacionalidad_padre;
        $familia->apellido_madre =$request->apellido_madre;
        $familia->nombre_madre =$request->nombre_madre;
        $familia->nacionalidad_madre =$request->nacionalidad_madre;
        $familia->fecha_nacimiento_madre =$request->fecha_nacimiento_madre;
        $familia->cantidad_hijos =$request->cantidad_hijos;
        $familia->detalle_hijos =$request->detalle_hijos;
        $familia->id_persona =$id_persona;
        $familia->save();

        //Registrar Dato Legajo
        $datolagajo = new legajosModel();
        $datolagajo->numero_legajo =$request->numero_legajo;
        $datolagajo->fecha_ingreso =$request->fecha_ingreso;
        $datolagajo->categoria =$request->categoria;
        $datolagajo->id_usuario =$request->id_usuario;
        $datolagajo->id_personas =$id_persona;
        $datolagajo->cargo_id =$request->cargo_id;
        $datolagajo->operador =$operador;
        $datolagajo->save();
        return redirect('/legajos-index')->with('ok','');
    }

    public function editar_legajo($id){
        $tipo_documento = TipoDocumentoModel::all();
        $provincias =provinciasModel::all();
        $localidades =localidadesModel::all();
        $estado_civil=estadoCivilModel::all();
        $usuarios = User::all();
        $sexo = sexoModel::all();
        $cargo = CargoModel::all();
        $datos_personales = personasModel::findOrFail($id);
        $domicilio = domicilioPersonasModel::where('id_persona', $id )->get();
        $ocupacion = ocupacionPersonasModel::where('id_persona', $id)->get();
        $dato_familia = personasFamiliaModel::where('id_persona', $id)->get();
        $datos_legajo = legajosModel::where('id_personas', $id)->get();
        $id_persona = $id;
        return view ('paginas.legajos.editar_legajo', compact('tipo_documento','provincias','localidades'
        ,'estado_civil','usuarios','sexo','cargo','datos_personales','domicilio','ocupacion','dato_familia',
     'datos_legajo','id_persona'));

    }
    public function actualizar_legajo (Request $request){

        $datos = array(
            "nombre" => $request->nombre,
            "apellido" => $request->apellido,
            "tipo_dni_id" => $request->tipo_dni_id,
            "dni" => $request->dni,
            "fecha_nacimiento" => $request->fecha_nacimiento,
            "nacionalidad" => $request->nacionalidad,
            "provincia" => $request->provincia,
            "localidad" => $request->localidad,
            "id_estado_civil" => $request->id_estado_civil,
            "sexo_id" => $request->sexo_id,
            "telefono" => $request->telefono,
            "email" => $request->email
        );
        $datos_personales = personasModel::findOrFail($request->id_persona)->update($datos);

        $dato_domicilio =array(
            "descripcion_domicilio" => $request->descripcion_domicilio
        );
        $domicilio = domicilioPersonasModel::findOrFail($request->id_persona)->update($dato_domicilio);

        $ocupacion_persona =array(
            "descripcion_ocupacion" => $request->descripcion_ocupacion
        );
        $persona_ocupacion = ocupacionPersonasModel::findOrFail($request->id_persona)->update($ocupacion_persona);


        $dato_familia =array(
            "apellido_padre" => $request->apellido_padre,
            "nombre_padre" => $request->nombre_padre,
            "fecha_nacimiento_padre" => $request->fecha_nacimiento_padre,
            "nacionalidad_padre" => $request->nacionalidad_padre,
            "apellido_madre" => $request->apellido_madre,
            "nombre_madre" => $request->nombre_madre,
            "fecha_nacimiento_madre" => $request->fecha_nacimiento_madre,
            "nacionalidad_madre" => $request->nacionalidad_madre,
            "cantidad_hijos" => $request->cantidad_hijos,
            "detalle_hijos" => $request->detalle_hijos
        );
        $familia =personasFamiliaModel::findOrFail($request->id_persona)->update($dato_familia);


        $dato_legajo =array(
            "numero_legajo" => $request->numero_legajo,
            "fecha_ingreso" => $request->fecha_ingreso,
            "categoria" => $request->categoria,
            "id_usuario" => $request->id_usuario,
            "cargo_id" => $request->cargo_id

        );
        $legajo =legajosModel::findOrFail($request->id_persona)->update($dato_legajo);

        return redirect('/legajos-index')->with('Okey-actualizar','');



    }
    public function editar_legajo_empleado($id){
        $datos_personales = personasModel::findOrFail($id);
        $domicilio = domicilioPersonasModel::where('id_persona', $id )->get();
        $id_persona = $id;
        return view('paginas.legajos.editar_legajo_empleado',compact('datos_personales','domicilio','id_persona'));
    }
    public function actualizar_legajo_empleado(Request $request){

        $datos = array(
            "telefono" => $request->telefono,
            "email" => $request->email
        );

        $datos_personales = personasModel::findOrFail($request->id_persona)->update($datos);

        $dato_domicilio =array(
            "descripcion_domicilio" => $request->descripcion_domicilio
        );

        $domicilio = domicilioPersonasModel::findOrFail($request->id_persona)->update($dato_domicilio);

        return redirect('/legajos-index')->with('Okey-actualizar-empleado','');
    }


}
