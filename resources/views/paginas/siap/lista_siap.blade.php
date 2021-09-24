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
                            @php echo date('d-m-Y', strtotime($item->fecha)); @endphp
                            </th>


                            @endforeach

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
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

