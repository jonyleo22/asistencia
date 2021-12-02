@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <div class="card-title"> <strong>Periódo: </strong> {{ $fecha_desde }} - {{ $fecha_hasta }}
                </div>
                <table class="table table-striped text-sm" id="tabla-siap2">
                    <thead>
                        <tr>
                            <th>Apellido y Nombre</th>
                            <th>DNI</th>
                            @foreach ($fechas as $item)
                        

                            <th class="px-1">
                            @php echo date('d', strtotime($item->fecha)); @endphp
                            </th>


                            @endforeach
                            <th>LAR</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $element)

                        <tr>
                            <td>
                                {{$element->apellido}} {{$element->nombre}}
                            </td>
                            <td>{{$element->dni_empleado}}</td>
                                
                                @foreach ($fechas as $items)
                                <td>
                                @php
                                $contar = DB::table('asistencias')
                                ->where('id_usuario', $element->id)
                                ->where('asistencias.fecha', $items->fecha )
                                ->get();
                                foreach ($contar as $valor)
                                {
                                    echo "$valor->estado";
                                }
                                @endphp
                                </td>
                    
                                @endforeach
                                <td> 
                                 @php
                                $persona = DB::table('personas')
                                ->where('dni', $element->dni_empleado)
                                ->get();

                                $vacaciones = DB::table('vacaciones')
                                ->where('id_persona', $persona[0]->id)
                                ->orderBy('id','DESC')
                                ->take(1)
                                ->get();
                                
                                foreach ($vacaciones as $key1){
                                    
                                    echo "$key1->dias_disponible";

                                } 
                                
                                // $ultima_vacaciones = $vacaciones->toArray();
                                // $result = (array) $ultima_vacaciones;
                                // $php_array = json_encode($ultima_vacaciones);
                                // $php_array_decodificado = json_decode($php_array,true);

                                // echo $ultima_vacaciones[0]["dias_disponible"];
                                // print_r   ($ultima_vacaciones);

                                //    echo '<pre>'; print_r( $ultima_vacaciones->dias_disponible); echo '</pre>';
                                //    return $php_array_decodificado->dias_disponible;

                                @endphp
                                </td>

                                
                                
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

