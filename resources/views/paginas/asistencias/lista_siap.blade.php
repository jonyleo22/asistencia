@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <div class="card-title"> <strong>Periódo: </strong> {{ $fecha_desde }} - {{ $fecha_hasta }}
                </div>
                <table class="table table-striped" id="tabla-siap">

                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Cant. asistencias</th>
                            <th>Cant. inasistencias</th>
                            <th>Vacaciones</th>
                            <th>Licencia</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($usuarios as $element)
                        <tr>
                            <td>{{ $element->nombre }}</td>
                            <td>{{ $element->apellido }}</td>
                            <td>
                                @php
                                $contar = DB::table('asistencias')
                                ->where('id_usuario', $element->id)
                                ->whereIn('estado', [1,3,4])
                                ->whereBetween('fecha', [$fecha_desde, $fecha_hasta])
                                ->get();
                                $aux = count($contar);
                                echo $aux;
                                @endphp
                            </td>
                            <td>
                                @php
                                $contar = DB::table('asistencias')
                                ->where('id_usuario', $element->id)
                                ->where('estado', 2)
                                ->whereBetween('fecha', [$fecha_desde, $fecha_hasta])
                                ->get();
                                $aux = count($contar);
                                echo $aux;
                                @endphp
                            </td>
                            <td>
                                @php
                                $contar = DB::table('asistencias')
                                ->where('id_usuario', $element->id)
                                ->where('estado', 3)
                                ->whereBetween('fecha', [$fecha_desde, $fecha_hasta])
                                ->get();
                                $aux = count($contar);
                                echo $aux;
                                @endphp
                            </td>
                            <td>
                                @php
                                $contar = DB::table('asistencias')
                                ->where('id_usuario', $element->id)
                                ->where('estado', 4)
                                ->whereBetween('fecha', [$fecha_desde, $fecha_hasta])
                                ->get();
                                $aux = count($contar);
                                echo $aux;
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

