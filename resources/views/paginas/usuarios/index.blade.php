@extends('plantilla')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="jumbotron text-center">
                <h1>Usuarios</h1>
                <h4>
                    <p>Realice aquí la administración de usuarios</p>
                </h4>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="col-lg-2">
                    <div class="card">
                        <div class="btn-group">
                            <a href="{{ route('formulario_usuario') }}" type="button" class="btn btn-block btn-primary">
                                Nuevo usuario</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="tabla-usuarios">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Usuario</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th>Dni</th>
                                <th>Email</th>
                                <th>Fecha ingreso</th>
                                <th>Sector</th>
                                <th>Cargo</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $element)
                                <tr>
                                    <td>{{ $element->id }}</td>
                                    <td>{{ $element->username }}</td>
                                    <td>{{ $element->nombre }}</td>
                                    <td>{{ $element->apellido }}</td>
                                    <td>{{ $element->direccion_empleado }}</td>
                                    <td>{{ $element->telefono_empleado }}</td>
                                    <td>{{ $element->dni_empleado }}</td>
                                    <td>{{ $element->email }}</td>
                                    <td>{{ $element->fecha_ingreso_empleado }}</td>
                                    <td>{{ $element->nombre_sector }}</td>
                                    <td>{{ $element->nombre_cargo }}</td>
                                    <td>{{ $element->nombre_rol }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <div class="">
                                                <a href="{{route ('formulario.edicion.usuario',$element->id )}}" class="btn btn-primary btn-sm" title="Editar usuario"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                            </div>
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
    @if (Session::has('ok'))

        <script>
            toastr.success('Usuario registrado correctamente')

        </script>

    @endif

@endsection
