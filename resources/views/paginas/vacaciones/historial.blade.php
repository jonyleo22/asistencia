@extends('plantilla')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="jumbotron text-center">
                <h1>Historial de licencia anual reglamentaria</h1>
                <h3><span>{{$datos[0]->apellido}} {{$datos[0]->nombre}}</span></h3>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="tabla-legajo">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Año lar</th>
                                    <th>Dias disponibles</th>
                                    <th>Dias lar</th>
                                    <th>Fecha desde</th>
                                    <th>Fecha hasta</th>
                                    <th>Operador</th>
                                    <th>Observación</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vacaciones as $element)
                                    <tr>
                                        <td>{{ $element->id }}</td>
                                        <td>{{ $element->año_lar }}</td>
                                        <td>{{ $element->dias_disponible }}</td>
                                        <td>{{ $element->dias_lar }}</td>
                                        <td>{{$element->fecha_desde_lar}}</td>
                                        <td>{{$element->fecha_hasta_lar}}</td>
                                        <td>{{ $element->operador_lar }}</td>
                                        <td>{{ $element->observacion_lar }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (Session::has('Okey-vacaciones'))

        <script>
            toastr.success('Vacaciones registradas correctamente')
        </script>

    @endif

@endsection
