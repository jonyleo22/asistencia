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
            <div class="row">

                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Datos del usuarios</h3>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form role="form" method="POST" action="{{ route('actualizar.usuario') }}">
                            @method('PUT')
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="Usuario">Usuario</label>
                                            <input type="text" name="username"
                                                class="form-control @error('username') is-invalid @enderror"
                                                placeholder="Ingrese usuario" value="{{ $datos_usuario->username }}"
                                                value="{{ old('username') }}">

                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="Nombre">Nombre</label>
                                            <input type="text" name="nombre"
                                                class="form-control @error('nombre') is-invalid @enderror"
                                                placeholder="Ingrese Nombre" value="{{ $datos_usuario->nombre }}"
                                                value="{{ old('nombre') }}">

                                        </div>

                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="Apellido">Apellido</label>
                                            <input type="text" name="apellido"
                                                class="form-control @error('apellido') is-invalid @enderror"
                                                placeholder="Ingrese Apellido" value="{{ $datos_usuario->apellido }}"
                                                value="{{ old('apellido') }}">

                                        </div>

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="numero_legajo">N° Legajo</label>
                                            <input type="text" name="numero_legajo"
                                                class="form-control @error('numero_legajo') is-invalid @enderror"
                                                placeholder="Ingrese su N° Legajo"
                                                value="{{ $datos_usuario->numero_legajo }}"
                                                value="{{ old('numero_legajo') }}">

                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="numero_legajo">Categoría</label>
                                            <input type="text" name="categoria"
                                                class="form-control @error('categoria') is-invalid @enderror"
                                                placeholder="Ingrese su categoría"
                                                value="{{ $datos_usuario->categoria }}"
                                                value="{{ old('categoria') }}">

                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="direccion_empleado">Domicilio</label>
                                            <input type="text" name="direccion_empleado"
                                                class="form-control @error('direccion_empleado') is-invalid @enderror"
                                                placeholder="Ingrese su domicilio"
                                                value="{{ $datos_usuario->direccion_empleado }}"
                                                value="{{ old('direccion_empleado') }}">

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="telefono_empleado">Teléfono</label>
                                            <input type="text" name="telefono_empleado"
                                                class="form-control @error('telefono_empleado') is-invalid @enderror"
                                                placeholder="Ingrese teléfono"
                                                value="{{ $datos_usuario->telefono_empleado }}"
                                                value="{{ old('telefono_empleado') }}">

                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="tipo_dni_id">Tipo de documento:</label>
                                        <br>
                                        <select class="form-control @error('tipo_dni_id') is-invalid @enderror"
                                            name="tipo_dni_id" style="width: 100%;">

                                            @foreach ($tipo_documento as $element)

                                                @if ($element->id == $datos_usuario->tipo_dni_id)

                                                    <option selected value="{{ $datos_usuario->tipo_dni_id }}">
                                                        {{ $element->nombre_tipo_documento }}
                                                    </option>

                                                @else

                                                    <option value="{{ $element->id }}">
                                                        {{ $element->nombre_tipo_documento }}</option>

                                                @endif

                                            @endforeach

                                        </select>





                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="dni_empleado">Ingrese DNI</label>
                                            <input type="text" name="dni_empleado"
                                                class="form-control @error('dni_empleado') is-invalid @enderror"
                                                placeholder="Ingrese su DNI" value="{{ $datos_usuario->dni_empleado }}"
                                                value="{{ old('dni_empleado') }}">

                                        </div>
                                    </div>




                                </div>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Ingrese email " value="{{ $datos_usuario->email }}"
                                                value="{{ old('email') }}">
                                        </div>

                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="fecha_nacimiento">Fecha de nacimiento</label>
                                            <input type="text" name="fecha_nacimiento"
                                                class="form-control @error('fecha_nacimiento') is-invalid @enderror"
                                                value="{{ $datos_usuario->fecha_nacimiento }}"
                                                value="{{ old('fecha_nacimiento') }}">
                                        </div>
                                    </div>

                                </div>


                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label for="fecha_ingreso_empleado">Fecha ingreso</label>
                                        <input type="text" name="fecha_ingreso_empleado"
                                            class="form-control @error('fecha_ingreso_empleado') is-invalid @enderror"
                                            placeholder="Ingrese fecha_ingreso_empleado "
                                            value="{{ $datos_usuario->fecha_ingreso_empleado }}"
                                            value="{{ old('fecha_ingreso_empleado') }}">


                                    </div>


                                    <div class="col-lg-4">
                                        <label for="sector_id">Seleccione sector:</label>
                                        <br>
                                        <select class="form-control @error('sector_id') is-invalid @enderror"
                                            name="sector_id" style="width: 100%;">

                                            <option disabled selected value>Seleccionar</option>

                                            @foreach ($sectores as $element)

                                                @if ($element->id == $datos_usuario->sector_id)

                                                    <option selected value="{{ $datos_usuario->sector_id }}">
                                                        {{ $element->nombre_sector }}
                                                    </option>

                                                @else

                                                    <option value="{{ $element->id }}">
                                                        {{ $element->nombre_sector }}</option>

                                                @endif

                                            @endforeach

                                        </select>





                                    </div>


                                    <div class="col-lg-4">
                                        <label for="cargo_id">Seleccione cargo:</label>
                                        <br>
                                        <select class="form-control @error('cargo_id') is-invalid @enderror" name="cargo_id"
                                            style="width: 100%;">

                                            <option disabled selected value>Seleccionar</option>

                                            @foreach ($cargo as $element)

                                            @if ($element->id == $datos_usuario->cargo_id)

                                            <option selected value="{{ $datos_usuario->cargo_id }}">
                                                {{ $element->nombre_cargo }}
                                            </option>

                                        @else

                                            <option value="{{ $element->id }}">{{ $element->nombre_cargo }}</option>

                                        @endif
                                            @endforeach

                                        </select>





                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="Contraseña">Contraseña</label>
                                    <input type="password" name="password"
                                        class="form-control @error('contraseña') is-invalid @enderror"
                                        placeholder="Ingrese contraseña">

                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label for="id_consumo_persona">Seleccione Rol de usuario:</label>
                                        <br>
                                        <select class="form-control @error('roles_id') is-invalid @enderror" name="roles_id"
                                            style="width: 100%;">

                                            <option disabled selected value>Seleccionar</option>

                                            @foreach ($roles as $element)

                                            @if ($element->id == $datos_usuario->roles_id)

                                            <option selected value="{{ $datos_usuario->roles_id }}">
                                                {{ $element->nombre_rol }}
                                            </option>

                                        @else

                                            <option value="{{ $element->id }}">{{ $element->nombre_rol }}</option>

                                        @endif

                                            @endforeach

                                        </select>
                                        <input type="hidden" name="id_usuario" value="{{ $id_usuario }}">
                                        <input type="hidden" name="password_actual" value="{{ $password_actual }}">

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
    </div>
    </div>
@endsection
