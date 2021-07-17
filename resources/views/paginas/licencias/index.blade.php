@extends('plantilla')
@section('content')
 <div class="content-wrapper">
    <div class="container-fluid">
        <div class="jumbotron text-center">
            <h1>Licencias Médicas</h1>
            <h4>
                <p>Realice aquí la carga de su licencia médica</p>
            </h4>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="btn-group">
                    <div class="">
                        <a href="{{ route('formulario.maternidad') }}" type="button" class="btn btn-block btn-outline-primary">
                           Nueva licencia por  maternidad</a>
                    </div>
                    <div class="px-3">
                        <a href="{{ route('formulario.enfermedad') }}" type="button" class="btn btn-block btn-outline-primary">
                            Nueva licencia por enfermedad</a>
                    </div>
                    <div class="px-1">
                        <a href="{{ route('formulario.altamedica') }}" type="button" class="btn btn-block btn-outline-primary">
                           Alta médica</a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="tabla-legajo">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>N° Lic.</th>
                                <th>Hora</th>
                                <th>Fecha Lic.</th>
                                <th>Fecha Desde</th>
                                <th>Fecha Hasta</th>
                                <th>Operador</th>
                                <th>Tipo Lic.</th>
                                <th>PDF</th>
                                <th>Estado</th>
                                <th>Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($licencia  as $element)
                                <tr>
                                    <td>{{$element->id}}</td>
                                    <td>{{$element->nombre}}</td>
                                    <td>{{$element->apellido}}</td>
                                    <td>{{$element->id}}</td>
                                    <td>{{$element->hora_licencia}}</td>
                                    <td>{{$element->fecha_licencia}}</td>
                                    <td>
                                        @if ($element->fecha_desde == null )
                                        <div class='badge badge-danger'>No Posee </div>
                                        @else
                                        {{$element->fecha_desde}}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($element->fecha_hasta == null)

                                        <div class='badge badge-danger'>No Posee </div>

                                        @else
                                            {{$element->fecha_hasta}}
                                        @endif
                                    </td>
                                    <td>{{$element->operador_licencia}}</td>


                                    <td>
                                        @if ($element->tipo_licencia == 1)
                                        <div class='badge badge-secondary'> Maternidad </div>
                                        @endif
                                        @if ($element->tipo_licencia == 2)
                                        <div class='badge badge-secondary'> Enfermedad </div>
                                        @endif
                                        @if ($element->tipo_licencia == 3)
                                        <div class='badge badge-secondary'> Alta Medica </div>
                                        @endif


                                    </td>
                                    <td>
                                        @if ($element->archivo_licencia == null)
                                        <div class='badge badge-danger'>No Posee </div>
                                        @else
                                        {{$element->archivo_licencia}}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($element->estado_licencia == 1)
                                        <div class='badge badge-success'>Cargado </div>
                                        @endif
                                        @if ($element->estado_licencia == 2)
                                        <div class='badge badge-warning'> Pendiente </div>
                                        @endif
                                        @if ($element->estado_licencia == 3)
                                        <div class='badge badge-primary'> Finalizado </div>
                                        @endif

                                    <td>
                                        <div class="btn-group">

                                            @if (Auth::User()->roles_id == 1)
                                                <div class="">
                                                    <a href="# " class="btn btn-primary btn-sm" title="Imprimir"><i
                                                            class="fas fa-print"></i></a>
                                                </div>
                                            @endif
                                            @if (Auth::User()->roles_id == 3 || Auth::User()->roles_id == 1 )
                                            <div class="px-2">
                                                <a href="# " class="btn btn-info btn-sm" title="Finalizar Carga"><i
                                                        class="fas fa-clipboard-list"></i></a>
                                            </div>

                                            @endif
                                            {{-- @if (Auth::User()->roles_id == 1)
                                                <div class="">
                                                    <a href="#" class="btn btn-primary btn-sm" title="Editar Legajo"><i
                                                            class="fas fa-pencil-alt"></i></a>
                                                </div>
                                            @endif --}}

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
 </div>
@endsection
