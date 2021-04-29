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

                <div class="col-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Datos del usuarios</h3>
                        </div>

                        <form role="form" method="POST" action="{{route('registrar.usuario')}}">
                            @csrf

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="Usuario">Usuario</label>
                                            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Ingrese usuario" value="{{old ('username')}}">

                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="Nombre">Nombre</label>
                                            <input type="text" name="nombre" class="form-control" @error('nombre') is-invalid @enderror placeholder="Ingrese Nombre" value="{{old ('nombre')}}" >

                                        </div>

                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="Apellido">Apellido</label>
                                            <input type="text"name="apellido" class="form-control @error('apellido') is-invalid @enderror"  placeholder="Ingrese Apellido" value="{{old ('apellido')}}">

                                        </div>

                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="direccion_empleado">Dirección</label>
                                            <input type="text"name="direccion_empleado" class="form-control @error('direccion_empleado') is-invalid @enderror"  placeholder="Ingrese su dirección" value="{{old ('direccion_empleado')}}">

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="telefono_empleado">Teléfono</label>
                                            <input type="text"name="telefono_empleado" class="form-control @error('telefono_empleado') is-invalid @enderror"  placeholder="Ingrese teléfono" value="{{old ('telefono_empleado')}}">

                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="tipo_dni_id">Tipo de documento:</label>
                                        <br>
                                        <select class="form-control @error('tipo_dni_id') is-invalid @enderror"
                                            name="tipo_dni_id" style="width: 100%;" >

                                            <option disabled selected value>Seleccionar</option>

                                            @foreach ($tipo_documento as $element)

                                                {{-- <option value="{{ $element->id }}">
                                                    {{ $element->nombre_tipo_documento }}</option> --}}
                                                    <option value="{{ $element->id }}" {{ old('tipo_dni_id') == $element->id ? 'selected' : '' }}> {{ $element->nombre_tipo_documento }}</option>

                                            @endforeach

                                        </select>





                                </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="dni_empleado">Ingrese DNI</label>
                                            <input type="text"name="dni_empleado" class="form-control @error('dni_empleado') is-invalid @enderror"  placeholder="Ingrese su DNI" value="{{old ('dni_empleado')}}">

                                        </div>
                                    </div>




                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email"name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Ingrese email " value="{{old ('email')}}">

                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label for="fecha_ingreso_empleado">Fecha ingreso</label>
                                    <input type="date"name="fecha_ingreso_empleado" class="form-control @error('fecha_ingreso_empleado') is-invalid @enderror" placeholder="Ingrese fecha_ingreso_empleado " value="{{old ('fecha_ingreso_empleado')}}">


                                    </div>


                                    <div class="col-lg-4">
                                        <label for="sector_id">Seleccione sector:</label>
                                        <br>
                                        <select class="form-control @error('sector_id') is-invalid @enderror"
                                            name="sector_id" style="width: 100%;" >

                                            <option disabled selected value>Seleccionar</option>

                                            @foreach ($sectores as $element)

                                                {{-- <option value="{{ $element->id }}">
                                                    {{ $element->nombre_sector }}</option> --}}.
                                                    <option value="{{ $element->id }}" {{ old('sector_id') == $element->id ? 'selected' : '' }}> {{ $element->nombre_sector}}</option>

                                            @endforeach

                                        </select>





                                </div>


                                <div class="col-lg-4">
                                    <label for="cargo_id">Seleccione cargo:</label>
                                    <br>
                                    <select class="form-control @error('cargo_id') is-invalid @enderror"
                                        name="cargo_id" style="width: 100%;" >

                                        <option disabled selected value>Seleccionar</option>

                                        @foreach ($cargo as $element)

                                            {{-- <option value="{{ $element->id }}">
                                                {{ $element->nombre_cargo }}</option> --}}
                                                <option value="{{ $element->id }}" {{ old('cargo_id') == $element->id ? 'selected' : '' }}> {{ $element->nombre_cargo}}</option>

                                        @endforeach

                                    </select>





                            </div>

                                </div>
                                <div class="form-group">
                                    <label for="Contraseña">Contraseña</label>
                                    <input type="password" name="password" class="form-control @error('contraseña') is-invalid @enderror" placeholder="Ingrese contraseña" >

                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-6">
                                            <label for="id_consumo_persona">Seleccione Rol de usuario:</label>
                                            <br>
                                            <select class="form-control @error('id_roles') is-invalid @enderror"
                                                name="roles_id" style="width: 100%;" >

                                                <option disabled selected value>Seleccionar</option>

                                                @foreach ($roles as $element)

                                                    {{-- <option value="{{ $element->id }}">
                                                        {{ $element->nombre_rol }}</option> --}}
                                                        <option value="{{ $element->id }}" {{ old('roles_id') == $element->id ? 'selected' : '' }}> {{ $element->nombre_rol}}</option>

                                                @endforeach

                                            </select>





                                    </div>
                                    <div class="col-lg-6">
                                        <label for="justificativo">Posee justifivativo para inasistencias:</label>
                                            <br>
                                            <select class="form-control @error('justificativo') is-invalid @enderror"
                                            name="justificativo" style="width: 100%;" >
                                            <option disabled selected>Seleccionar</option>
                                            <option value="2">No</option>
                                            <option value="1">Si</option>
                                            </select>


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