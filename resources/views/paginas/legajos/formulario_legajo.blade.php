@extends('plantilla')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="jumbotron text-center">
                <h1>Alta de Legajo</h1>
            </div>
        </div>

        .<div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            Datos Personales
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
                        <form role="form" method="POST" action="{{route ('legajo.registro')}}">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="Nombre">Nombre</label>
                                            <input type="text" name="nombre"
                                                class="form-control @error('nombre') is-invalid @enderror"
                                                placeholder="Ingrese nombre" value="{{ old('nombre') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                        <label for="apellido">Apellido</label>
                                            <input type="text" name="apellido"
                                                class="form-control @error('apellido') is-invalid @enderror"
                                                placeholder="Ingrese apellido" value="{{ old('apellido') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                        <label for="fecha_ingreso">Fecha De ingreso</label>
                                            <input type="date" name="fecha_ingreso"
                                                class="form-control @error('fecha_ingreso') is-invalid @enderror"
                                                placeholder="Selecciones fecha de ingreso" value="{{ old('fecha_ingreso') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <div class="col-lg-4">
                                        <label for="tipo_dni_id">Tipo de documento:</label>
                                        <br>
                                        <select class="form-control @error('tipo_dni_id') is-invalid @enderror"
                                            name="tipo_dni_id" style="width: 100%;">

                                            <option disabled selected value>Seleccionar</option>

                                            @foreach ($tipo_documento as $element)

                                            {{-- <option value="{{ $element->id }}">
                                            {{ $element->nombre_tipo_documento }}</option> --}}
                                            <option value="{{ $element->id }}"
                                                {{ old('tipo_dni_id') == $element->id ? 'selected' : '' }}>
                                                {{ $element->nombre_tipo_documento }}</option>

                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="dni"> DNI</label>
                                            <input type="text" name="dni"
                                                class="form-control @error('dni') is-invalid @enderror"
                                                placeholder="Ingrese su DNI" value="{{ old('dni') }}">

                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Ingrese email " value="{{ old('email') }}">
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                        <label for="fecha_nacimiento">Fecha De nacimiento</label>
                                            <input type="date" name="fecha_nacimiento"
                                                class="form-control @error('fecha_nacimiento') is-invalid @enderror"
                                                placeholder="Seleccione fecha de nacimiento" value="{{ old('fecha_nacimiento') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                        <label for="domicilio">Domicilio</label>
                                            <input type="text" name="domicilio"
                                                class="form-control @error('domicilio') is-invalid @enderror"
                                                placeholder="Ingrese Domicilio" value="{{ old('domicilio') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                        <label for="telefono">Teléfono</label>
                                            <input type="text" name="telefono"
                                                class="form-control @error('telefono') is-invalid @enderror"
                                                placeholder="Ingrese telefóno" value="{{ old('telefono') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                         <label for="numero_legajo">N° legajo</label>
                                            <input type="text" name="numero_legajo"
                                                class="form-control @error('numero_legajo') is-invalid @enderror"
                                                placeholder="Ingrese N° legajo" value="{{ old('numero_legajo') }}">
                                        </div>
                                    </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                            <label for="categoria">Categoria</label>
                                                <input type="text" name="categoria"
                                                    class="form-control @error('categoria') is-invalid @enderror"
                                                    placeholder="Ingrese categoria" value="{{ old('categoria') }}">
                                            </div>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="id_usuario">Usuario asociado:</label>
                                        <br>
                                        <select class="form-control @error('id_usuario') is-invalid @enderror"
                                            name="id_usuario" style="width: 100%;">

                                            <option disabled selected value>Seleccionar</option>

                                            @foreach ($usuarios as $element)

                                             <option value="{{ $element->id }}">
                                                DNI:
                                            {{  $element->dni_empleado }} | Apellido: {{$element->apellido }} | Nombre: {{$element->nombre}}</option>
                                            {{-- <option value="{{ $element->id }}"
                                                {{ old('id_usuario') == $element->id ? 'selected' : '' }}>
                                                {{ $element->nombre_tipo_documento }}</option> --}}

                                            @endforeach

                                        </select>
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
