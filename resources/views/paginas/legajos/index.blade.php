@extends('plantilla')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="jumbotron text-center">
                <h1>Legajos</h1>
                <h4>
                    <p>Realice aquí la administración de legajos</p>
                </h4>
            </div>
        </div>

        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="btn-group">
                        <div class="">
                            <a href="{{ route('formulario.legajo') }}" type="button"
                                class="btn btn-block btn-outline-primary">
                                Nuevo legajo</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="tabla-legajo">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Fecha ingreso</th>
                                    <th>Dni</th>
                                    <th>Email</th>
                                    <th>Fecha nacimiento</th>
                                    <th>Edad</th>
                                    <th>Domicilio</th>
                                    <th>Teléfono</th>
                                    <th>N° legajos</th>
                                    <th>Categoria</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($legajo as $element)
                                    <tr>
                                        <td>{{ $element->nombre }}</td>
                                        <td>{{ $element->apellido }}</td>
                                        <td>{{ $element->fecha_ingreso }}</td>
                                        <td>{{ $element->dni }}</td>
                                        <td>{{ $element->email }}</td>
                                        <td>{{ $element->fecha_nacimiento }}</td>
                                        <td>{{ $element->edad }}</td>
                                        <td>{{ $element->domicilio }}</td>
                                        <td>{{ $element->telefono }}</td>
                                        <td>{{ $element->numero_legajo }}</td>
                                        <td>{{ $element->categoria }}</td>
                                        <td>
                                            <div class="btn-group">
                                                @if (Auth::User()->roles_id == 1)
                                                    <div class="">
                                                        <a href="#" class="btn btn-primary btn-sm" title="Editar Legajo"><i
                                                                class="fas fa-pencil-alt"></i></a>
                                                    </div>
                                                    <div class="px-1">
                                                        <a href="{{route ('vacaciones.index',$element->id)}}" class="btn btn-success btn-sm"
                                                            title="Vacaciones"><i class="far fa-paper-plane"></i></a>
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
    @if (Session::has('okey-registro'))

        <script>
            toastr.success('Legajo registrado correctamente')

        </script>

    @endif
@endsection
