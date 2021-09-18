@extends('plantilla')
@section('content')
<div class="content-wrapper">

    <table class=" table-bordered ">
            <thead>
                <tr>
                    <th>Apellido y Nombre</th>
                    @foreach ($fechas as $item)

                        <th class="px-1">
                            <td>@php echo date('d-m-Y', strtotime($item->fecha)); @endphp</td>
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
                    <td>
                        @php
                        $contar = DB::table('asistencias')
                        ->where('id_usuario', $element->id)
                        ->whereIn('estado', [1,3,4])
                        ->whereBetween('fecha', [$fecha_desde, $fecha_hasta])
                        ->select('asistencias.estado')
                        ->get();

                        echo $contar;
                        @endphp
                    </td>
                </tr>

                @endforeach
            </tbody>
    </table>

</div>
@endsection

