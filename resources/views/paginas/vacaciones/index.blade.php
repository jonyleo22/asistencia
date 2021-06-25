@extends('plantilla')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="jumbotron text-center">
                <h1>Licencia anual reglamentaria</h1>
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
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Fecha ingreso</th>
                                    <th>Categoría</th>
                                    <th>Acciones</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datos as $element)
                                    <tr>
                                        <td>{{ $element->id }}</td>
                                        <td>{{ $element->nombre }}</td>
                                        <td>{{ $element->apellido }}</td>
                                        <td>@php echo date('d/m/Y', strtotime($element->fecha_ingreso)); @endphp</td>
                                        <td>{{ $element->categoria }}</td>
                                        <td>

                                            <div class="btn-group">

                                                @if (Auth::User()->roles_id == 1)
                                                    <div class="px-1">
                                                        <a href="{{ route('formulario.vacaciones', $element->id) }}"
                                                            class="btn btn-success btn-sm" title="Vacaciones"><i
                                                                class="far fa-paper-plane"></i></a>
                                                    </div>

                                                @endif
                                            </div>

                                            <div class="btn-group">

                                                @if (Auth::User()->roles_id == 1)
                                                    <div class="px-1">
                                                        <a href="{{ route('formulario.vacaciones', $element->id) }}"
                                                            class="btn btn-danger btn-sm" title="Salida"><i
                                                                class="fa fa-child"></i></a>
                                                    </div>

                                                @endif
                                            </div>

                                            <div class="btn-group">

                                                @if (Auth::User()->roles_id == 1)
                                                    <div class="px-1">
                                                        <a href="{{ route('historial.vacaciones', $element->id) }}"
                                                            class="btn btn-info btn-sm" target="_blank" title="Ver historial"><i
                                                                class="fas fa-search"></i></a>
                                                    </div>

                                                @endif
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
    @if (Session::has('Okey-vacaciones'))

        <script>
            toastr.success('Vacaciones registradas correctamente')
        </script>

    @endif

@endsection
