@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="jumbotron text-center">
            <h1>Listado de asistencias</h1>
            <h4>
                <p>Consultar por fecha</p>
            </h4>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
         <form role="form">
            @csrf
            <div class="row">
                <div class="col-lg-2">
                    <label for="fecha_desde">Feche desde:</label>
                    <input type="date" class="form-control" name="fecha_desde">
                </div>
                <div class="col-lg-2">
                    <label for="fecha_hasta">Feche hasta:</label>
                    <input type="date" class="form-control" name="fecha_hasta">
                </div>
                <div class="col-lg-2">
                    <label for="dni">DNI</label>
                    <input type="text" class="form-control" name="dni" >
                </div>
                <div class="col-lg-2">
                   <button type="submit" class="btn btn-secondary" style="margin-top: 30px;">Buscar</button>
                </div>
            </div>
        </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="tabla-informe">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Dni</th>
                            <th>Apellido</th>
                            <th>Nombre</th>
                            <th>Hora de entrada</th>
                            <th>Hora de salida</th>
                            <th>Observación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($asistencia as $element)
                        <tr>
                            <td>{{ $element->id }}</td>
                            <td>@php echo date('d/m/Y', strtotime($element->fecha)); @endphp</td>
                            <td>{{ $element->dni_empleado }}</td>
                            <td>{{ $element->apellido }}</td>
                            <td>{{ $element->nombre }}</td>
                            <td>
                                @if ( $element->hora_entrada != null)
                                {{ $element->hora_entrada }}
                                @endif
                            @if ( $element->hora_entrada == null && $element->estado == 2)
                            <div class='badge badge-danger'>Ausente</div>
                            @endif
                            @if ( $element->hora_entrada == null && $element->estado == 3)
                            <div class='badge badge-warning'>Vacaciones</div>
                            @endif
                            @if ( $element->hora_entrada == null && $element->estado == 4)
                            <div class='badge badge-secondary'>Licencia Médica</div>
                            @endif
                            @if ( $element->hora_entrada == null && $element->estado == 5)
                            <div class='badge badge-danger'>Ausente con Aviso</div>
                            @endif
                            </td>
                            <td>
                                @if ( $element->hora_salida != null)
                                {{ $element->hora_salida }}
                                @endif
                                @if ( $element->hora_salida == null && $element->estado == 2)
                                <div class='badge badge-danger'>Ausente</div>
                                @endif
                                @if ( $element->hora_salida == null && $element->estado == 3)
                                <div class='badge badge-warning'>Vacaciones</div>
                                @endif
                                @if ( $element->hora_salida == null && $element->estado == 4)
                                <div class='badge badge-secondary'>Licencia Médica</div>
                                @endif
                                @if ( $element->hora_entrada == null && $element->estado == 5)
                            <div class='badge badge-danger'>Ausente con Aviso</div>
                            @endif
                            </td>
                            <td>
                                @if ($element->observacion_asistencia != null)
                                {{$element->observacion_asistencia }}
                                @else
                                <div class='badge badge-danger'>No posee</div>
                                @endif
                            </td>
                            <td>
                                <div class="">
                                    <a href="{{ route('formulario.observacion', $element->id ) }}" class="btn btn-primary btn-sm" title="Agregar observación"><i
                                            class="fas fa-file-medical"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                   </tbody>


                </table>


            </div>

        </div>

    </div>
</div>

@if (Session::has('ok-obs'))

<script>
    toastr.success('Observación agregada correctamente')
</script>
@endif
@endsection
