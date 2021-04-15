@extends('plantilla')
@section('content')
    <div class="content-wrapper">
        <div class="jumbotron text-center">
            <h1>Administración usuarios</h1>
            <h4>
                <p>Formulario alta de usuario</p>
            </h4>
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center">

                <div class="col-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Datos del usuarios</h3>
                        </div>

                        <form role="form" method="POST" action="#">
                            @csrf

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="Usuario">Usuario</label>
                                            <input type="text" name="usuario" class="form-control @error('name') is-invalid @enderror placeholder="Ingrese usuario" required>
                                            @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group @error('nombre') is-invalid @enderror">
                                            <label for="Nombre">Nombre</label>
                                            <input type="text" name="nombre" class="form-control" placeholder="Ingrese Nombre"required>
                                            @error('nombre')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group @error('apellido') is-invalid @enderror">
                                            <label for="Apellido">Apellido</label>
                                            <input type="text"name="apellido" class="form-control" placeholder="Ingrese Apellido"required>
                                            @error('apellido')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>

                                </div>
                                <div class="form-group @error('email') is-invalid @enderror">
                                    <label for="Email">Email</label>
                                    <input type="email"name="email" class="form-control" placeholder="Ingrese email" required>
                                    @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                </div>
                                <div class="form-group @error('contraseña') is-invalid @enderror ">
                                    <label for="Contraseña">Contraseña</label>
                                    <input type="password" name="contraseña" class="form-control" placeholder="Ingrese contraseña" required>
                                    @error('contraseña')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <label for="id_consumo_persona">Seleccione Rol de usuario:</label>
                                            <br>
                                            <select class="form-control @error('id_roles') is-invalid @enderror"
                                                name="roles_id" style="width: 100%;" required>

                                                <option disabled selected value>Seleccionar</option>

                                                @foreach ($roles as $element)

                                                    <option value="{{ $element->id }}">
                                                        {{ $element->nombre_rol }}</option>

                                                @endforeach

                                            </select>

                                            @error('id_roles')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong> {{ $message }} </strong>
                                                </span>
                                            @enderror
                                        </div>


                                    </div>


                                </div>

                            </div>

                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                    </form>
                </div>


            </div>

        </div>
    </div>
    </div>
@endsection
