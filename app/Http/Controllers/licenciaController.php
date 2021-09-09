<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\articulosModel;
use App\decretosModel;
use App\domicilioPersonasModel;
use App\legajosModel;
use App\LicenciasModel;
use App\personasModel;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class licenciaController extends Controller
{
    public function index()
    {
        $licencia = LicenciasModel::join('legajos', 'legajos.id', 'licencias.id_legajo')
            ->join('personas', 'personas.id', 'legajos.id_personas')
            ->select(
                'licencias.id',
                'personas.nombre',
                'personas.apellido',
                'licencias.hora_licencia',
                'licencias.fecha_licencia',
                'licencias.fecha_desde',
                'licencias.fecha_hasta',
                'licencias.operador_licencia',
                'licencias.archivo_licencia',
                'licencias.tipo_licencia',
                'licencias.estado_licencia'
            )
            ->orderBy('licencias.id', 'desc')
            ->get();
        // dd($licencia);


        return view('paginas.licencias.index', compact('licencia'));
    }



    public function formulario_enfermedad()
    {

        // $id_usuario = Auth::user()->id;
        // $legajo = legajosModel::where('id_usuario', $id_usuario)->get();
        // $categoria = $legajo[0]->categoria;
        // $id_persona = $legajo[0]->id_personas;
        // $persona = personasModel::where('id', $id_persona)->get();
        // $edad = $persona[0]->edad;
        // $domicilio_persona = domicilioPersonasModel::where('id_persona', $id_persona)->get();
        // $domicilio = $domicilio_persona[0]->descripcion_domicilio;

        //dd($fecha);
        // dd($año);
        return view('paginas.licencias.dni_enfermedad');
    }

    public function buscar_dni_enfermedad (Request $request){
        $dni = $request->dni;
        $añoactual = Carbon::now();
        $año = $añoactual->format('Y');
        $fecha = $añoactual->format('d-m-Y');
        $hora_actual = Carbon::now()->timezone("America/Argentina/Buenos_Aires");
        $hora = $hora_actual->format('H:i:s');
        $validardni = personasModel::where('dni', $dni)->get();
        if (count($validardni) > 0) {
            $id_persona = $validardni[0]->id;
            $categoria =legajosModel::where('id_personas',$id_persona)->get();
            $domicilio=domicilioPersonasModel::where('id_persona',$id_persona)->get();
            $id_usuario = $categoria[0]->id_usuario;
                return view('paginas.licencias.formulario_enfermedad',compact('dni','hora','fecha','año','validardni','categoria','domicilio','id_usuario'));
        }else {
            return redirect()->back()->with('No-Existe', '');
        }
    }


    public function enfermedad_registro(Request $request)
    {
        // dd($dni);
        $operador = Auth::user()->apellido . ' ' . Auth::user()->nombre;
        $fecha = carbon::now();
        $año = $fecha->format('Y');
        $fechaactual = $fecha->format('d-m-Y');
        $hora_actual = Carbon::now()->timezone("America/Argentina/Buenos_Aires");
        $hora = $hora_actual->format('H:i:s');

        $id_usuario = $request->id_usuario;
        $id_legajo = legajosModel::where('id_usuario', $id_usuario)->get();
        // dd($id_legajo[0]->id);
        $licencia = new LicenciasModel();
        $licencia->id_legajo = $id_legajo[0]->id;
        $licencia->hora_licencia = $hora;
        $licencia->fecha_licencia = $fechaactual;
        $licencia->operador_licencia = $operador;
        $licencia->tipo_licencia = 2;   // 2 = Enfermedad
        $licencia->estado_licencia = 1; // estado 1 Pendiente
        $licencia->save();
        $id_licencia = $licencia->id;

        $n_licencia = array(
            'numero_licencia' => $id_licencia."/".$año
        );

        $update_n_licencia = LicenciasModel::findOrFail($id_licencia)->update($n_licencia);

        return redirect('/licencias-index')->with('ok-registro-licencia', '');
    }

    public function enfermedad_paso2($id)
    {

       $licencia = LicenciasModel::FindOrFail($id);
       $idlegajo = $licencia->id_legajo;
       $legajo = legajosModel::where('id', $idlegajo)->get();
       $idpersona = $legajo[0]->id_personas;
       $persona =personasModel::where('id',$idpersona)->get();
       $domicilio =domicilioPersonasModel::where('id_persona',$idpersona)->get();
        // dd($domicilio);



        $añoactual = Carbon::now();
        $año = $añoactual->format('Y');
        $fecha = $añoactual->format('d-m-Y');
        $hora_actual = Carbon::now()->timezone("America/Argentina/Buenos_Aires");
        $hora = $hora_actual->format('H:i:s');
        $licencia = LicenciasModel::FindOrFail($id);
        $n_licencia =$licencia->numero_licencia;
        $imprimir = LicenciasModel::findOrFail($id);
        // dd($imprimir);
        // dd($año);
        return view('paginas.licencias.enfermedad_paso2', compact('año', 'fecha', 'hora', 'n_licencia', 'imprimir','legajo','persona','domicilio'));
    }

    public function finalizar_enfermedad($id)
    {
        $decretos = decretosModel::join('articulos', 'articulos.id', 'decretos.id_articulos')->get();

        $id_enfermedad = $id;
        return view('paginas.licencias.finalizar_enfermedad', compact('id_enfermedad', 'decretos'));
    }

    public function registrar_finalizar_enfermedad(Request $request)
    {
        $legajo = LicenciasModel::find($request->id_enfermedad);
        $idlegajo = $legajo->id_legajo;

        $buscarlegajo = legajosModel::find($idlegajo);
        $iduser = $buscarlegajo->id_usuario;



        $ruta = "archivo_licencias/".date("Ymdhisv").".".$request->archivo->guessExtension();
        move_uploaded_file($request->archivo, $ruta);

        $enfermedad = array(
            "fecha_desde" => $request->fecha_desde,
            "fecha_hasta" => $request->fecha_hasta,
            "archivo_licencia" => $ruta,
            "id_decretos" => $request->id_decretos,
            "estado_licencia" => 4 //licencia médica

        );
        $actualizar_datos = LicenciasModel::findOrFail($request->id_enfermedad)->update($enfermedad);

        $fecha_desde = $request->fecha_desde;
        $fecha_hasta = $request->fecha_hasta;
        // tus datos de entrada
        $start = $fecha_desde;
        $end   = $fecha_hasta;
        // generas las fechas entre el periodo
        $end = new DateTime($end); // éstas 2 lineas son necesarias para que DatePeriod incluya la ultima fecha
        $end->modify('+ 1 day');
        $period = new DatePeriod(
            new DateTime($start),
            new DateInterval('P1D'),
            $end
        );

        // recorres las fechas y haces tu insert

        //buscar usuario

        $id_usuario = $iduser;

        $idlegajo = LicenciasModel::find($request->id_enfermedad);
        foreach ($period as $key => $value) {
            $date = $value->format('Y-m-d');
            // $dia = $date("D");

            $dia = date("w", strtotime($date));


            if ($dia != 6 && $dia != 0) {
                DB::table('asistencias')->insert([
                    ['estado' => '4', 'id_usuario' => $id_usuario, 'fecha' => $date]
                ]);
            }
        }

        return redirect('/licencias-index')->with('okey-finalizar', '');
    }



    public function actualizar_estado_licencia(Request $request)
    {

        // dd($request->all());
        $licencia = array("estado_licencia" => 2);
        $actualizar_licencia = LicenciasModel::findOrfail($request->id_licencia)->update($licencia);

        return redirect()->back()->with('ok-imprimir', '');
    }




    public function formulario_altamedica()
    {
        // $id_usuario = Auth::user()->id;
        // $legajo = legajosModel::where('id_usuario', $id_usuario)->get();
        // $categoria = $legajo[0]->categoria;
        // $id_persona = $legajo[0]->id_personas;
        // $persona = personasModel::where('id', $id_persona)->get();
        // $edad = $persona[0]->edad;
        // $domicilio_persona = domicilioPersonasModel::where('id_persona', $id_persona)->get();
        // $domicilio = $domicilio_persona[0]->descripcion_domicilio;
        // $añoactual = Carbon::now();
        // $año = $añoactual->format('Y');
        // $fecha = $añoactual->format('d-m-Y');
        // $hora_actual = Carbon::now()->timezone("America/Argentina/Buenos_Aires");
        // $hora = $hora_actual->format('H:i:s');
        // //dd($fecha);
        // // dd($año);
        return view('paginas.licencias.dni_alta');
    }

    public function buscar_dni_alta (Request $request){
        $dni = $request->dni;

        $añoactual = Carbon::now();
        $año = $añoactual->format('Y');
        $fecha = $añoactual->format('d-m-Y');
        $hora_actual = Carbon::now()->timezone("America/Argentina/Buenos_Aires");
        $hora = $hora_actual->format('H:i:s');
        $validardni = personasModel::where('dni', $dni)->get();
        if (count($validardni) > 0) {
            $id_persona = $validardni[0]->id;
            $categoria =legajosModel::where('id_personas',$id_persona)->get();
            $domicilio=domicilioPersonasModel::where('id_persona',$id_persona)->get();
            $id_usuario = $categoria[0]->id_usuario;

                return view('paginas.licencias.formulario_altamedica',compact('dni','hora','fecha','año','validardni','categoria','domicilio','id_usuario'));
        }else {
            return redirect()->back()->with('No-Existe', '');
        }
    }


    public function alta_registro(Request $request)
    {
        $operador = Auth::user()->apellido . ' ' . Auth::user()->nombre;
        $fecha = carbon::now();
        $fechaactual = $fecha->format('d-m-Y');
        $año = $fecha->format('Y');
        $hora_actual = Carbon::now()->timezone("America/Argentina/Buenos_Aires");
        $hora = $hora_actual->format('H:i:s');
        $id_usuario = $request->id_usuario;
        $id_legajo = legajosModel::where('id_usuario', $id_usuario)->get();
        // dd($id_legajo[0]->id);
        $licencia = new LicenciasModel();
        $licencia->id_legajo = $id_legajo[0]->id;
        $licencia->hora_licencia = $hora;
        $licencia->fecha_licencia = $fechaactual;
        $licencia->operador_licencia = $operador;
        $licencia->tipo_licencia = 3;   // 3 = Alta
        $licencia->estado_licencia = 1; // estado 1 Pendiente
        $licencia->save();
        $id_licencia = $licencia->id;

        $n_licencia = array(
            'numero_licencia' => $id_licencia."/".$año
        );

        $update_n_licencia = LicenciasModel::findOrFail($id_licencia)->update($n_licencia);

        return redirect('/licencias-index')->with('okeylicencia', '');
    }
    public function alta_paso2($id)
    {

        $licencia = LicenciasModel::FindOrFail($id);
        $idlegajo = $licencia->id_legajo;
        $legajo = legajosModel::where('id', $idlegajo)->get();
        $idpersona = $legajo[0]->id_personas;
        $persona =personasModel::where('id',$idpersona)->get();
        $domicilio =domicilioPersonasModel::where('id_persona',$idpersona)->get();
         // dd($domicilio);

         $añoactual = Carbon::now();
         $año = $añoactual->format('Y');
         $fecha = $añoactual->format('d-m-Y');
         $hora_actual = Carbon::now()->timezone("America/Argentina/Buenos_Aires");
         $hora = $hora_actual->format('H:i:s');
         $licencia = LicenciasModel::FindOrFail($id);
         $n_licencia =$licencia->numero_licencia;
         $imprimir = LicenciasModel::findOrFail($id);

        return view('paginas.licencias.alta_paso2', compact('año', 'fecha', 'hora', 'n_licencia', 'imprimir','legajo','persona','domicilio'));
    }


    public function finalizar_alta_medica($id)
    {
        $decretos = decretosModel::join('articulos', 'articulos.id', 'decretos.id_articulos')->get();

        $id_alta = $id;
        return view('paginas.licencias.finalizar_alta_medica', compact('id_alta', 'decretos'));
    }


    public function registrar_finalizar_alta(Request $request)
    {

        $ruta = "archivo_licencias/" . date("Ymdhisv") . "." . $request->archivo->guessExtension();
        move_uploaded_file($request->archivo, $ruta);

        $altamedica = array(
            "fecha_desde" => $request->fecha_desde,
            "fecha_hasta" => $request->fecha_hasta,
            "archivo_licencia" => $ruta,
            "estado_licencia" => 4 //Alta Medica

        );
        $actualizar_datos = LicenciasModel::findOrFail($request->id_alta)->update($altamedica);

        return redirect('/licencias-index')->with('okey-finalizar alta', '');
    }


























    //ALTA DE DECRETO
    public function decreto_index()
    {
        $datos = decretosModel::all();
        // dd($datos);

        return view('paginas.decreto.index', compact('datos'));
    }
    public function formulario_decreto()
    {
        $articulos = articulosModel::all();


        return view('paginas.decreto.formulario_decreto', compact('articulos'));
    }
    public function registrar_decreto(Request $request)
    {
        // dd($request->all());
        $operador = Auth::user()->apellido . ' ' . Auth::user()->nombre;
        $decreto = new decretosModel();
        $decreto->numero_decreto = $request->numero_decreto;
        $decreto->id_articulos = json_encode($request->id_articulos);
        $decreto->operador_decreto = $operador;
        $decreto->save();

        return redirect('/decreto-index')->with('okey-decreto', '');
    }

    public function decreto_editar($id){
        $operador = Auth::user()->apellido . ' ' . Auth::user()->nombre;
        $decreto = decretosModel::findOrFail($id);
        $articulos = json_decode($decreto->id_articulos);

        $dato_articulos = array();
        foreach ($articulos as $element ) {
            $aux = articulosModel::where('id',$element)->get();
            array_push($dato_articulos,$aux);

        }

        $id_decreto = $id;
        $articulos_todos = articulosModel::all();
        return view('paginas.decreto.decreto_editar', compact('operador','decreto','id_decreto','articulos','dato_articulos','articulos_todos'));

    }
    public function actualizar_decreto(Request $request){
        $decreto =array(
            "numero_decreto" => $request->numero_decreto,

            "id_articulos" => json_encode($request->id_articulos)
        );
        $decreto =decretosModel::findOrFail($request->id_decreto)->update($decreto);


        return redirect('/decreto-index')->with('Okey-actualizar','');
    }
      //articulo

      public function articulo_index(){
        $datos = articulosModel::all();
        return view('paginas.articulo.index',compact('datos'));
      }

      public function formulario_articulo()
    {


        return view('paginas.articulo.formulario_articulo');
    }

    public function registrar_articulo(Request $request)
    {
        $operador = Auth::user()->apellido . ' ' . Auth::user()->nombre;
        $articulo = new articulosModel();
        $articulo->numero_articulo = $request->numero_articulo;
        $articulo->descripcion_articulo = $request->descripcion_articulo;
        $articulo->operador_articulo = $operador;
        $articulo->save();


        return redirect('/articulo-index')->with('okey-articulo', '');
    }
    public function articulo_editar($id){
        $operador = Auth::user()->apellido . ' ' . Auth::user()->nombre;
        $articulo = articulosModel::findOrFail($id);
        $id_articulo = $id;

     return view('paginas.articulo.articulo_editar',compact('operador','articulo','id_articulo'));

    }
    public function actualizar_articulo(Request $request){
        $articulo =array(
            "numero_articulo" => $request->numero_articulo,
            "descripcion_articulo" => $request->descripcion_articulo
        );
        $articulo =articulosModel::findOrFail($request->id_articulo)->update($articulo);

        return redirect('/articulo-index')->with('Okey-actualizar','');
    }


    public function ver_articulos ($id){

        $decreto =decretosModel::where('id',$id)->get();
        // dd($decreto);
        return view('paginas.decreto.ver_articulo');
    }
}
