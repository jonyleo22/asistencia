@extends('plantilla')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="jumbotron text-center">
                <h1>Alta de Legajo</h1>
                <h4>
                    <p>paso 1: Identificación de datos personales</p>
                </h4>
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
                        <form role="form" method="POST" action="{{ route('legajo.actualizar') }}">
                            @method('PUT')
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="Nombre">Nombre</label>
                                            <input type="text" name="nombre"
                                                class="form-control @error('nombre') is-invalid @enderror"
                                                placeholder="Ingrese nombre" value="{{$datos_personales->nombre}}" value="{{ old('nombre') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="apellido">Apellido</label>
                                            <input type="text" name="apellido"
                                                class="form-control @error('apellido') is-invalid @enderror"
                                                placeholder="Ingrese apellido" value="{{$datos_personales->apellido}}" value="{{ old('apellido') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="tipo_dni_id">Tipo de documento</label>
                                        <br>
                                        <select class="form-control @error('tipo_dni_id') is-invalid @enderror"
                                            name="tipo_dni_id" style="width: 100%;">

                                            <option disabled selected value>Seleccionar</option>

                                            @foreach ($tipo_documento as $element)

                                                @if ($element->id == $datos_personales->tipo_dni_id)

                                                    <option selected value="{{ $datos_personales->tipo_dni_id }}">
                                                        {{ $element->nombre_tipo_documento }}
                                                    </option>

                                                @else

                                                    <option value="{{ $element->id }}">
                                                        {{ $element->nombre_tipo_documento }}</option>

                                                @endif

                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="dni"> DNI</label>
                                            <input type="text" name="dni"
                                                class="form-control @error('dni') is-invalid @enderror"
                                                placeholder="Ingrese su DNI" value="{{$datos_personales->dni}}" value="{{ old('dni') }}">

                                        </div>
                                    </div>


                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="fecha_nacimiento">Fecha De nacimiento</label>
                                            <input type="date" name="fecha_nacimiento"
                                                class="form-control @error('fecha_nacimiento') is-invalid @enderror"
                                                placeholder="Seleccione fecha de nacimiento"
                                                value="{{$datos_personales->fecha_nacimiento}}"value="{{ old('fecha_nacimiento') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="nacionalidad">Nacionalidad</label>
                                            <input type="text" name="nacionalidad"
                                                class="form-control @error('nacionalidad') is-invalid @enderror"
                                                placeholder="Ingrese nacionalidad"value="{{$datos_personales->nacionalidad}}" value="{{ old('nacionalidad') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="provincia_id">Provincia</label>
                                        <br>
                                        <select class="form-control select2 @error('provincia_id') is-invalid @enderror"
                                            name="provincia_id" style="width: 100%;">

                                            <option disabled selected value>Seleccionar</option>
                                             @foreach ($provincias as $element)

                                                @if ($element->id == $datos_personales->provincia_id)

                                                    <option selected value="{{ $datos_personales->provincia_id }}">
                                                        {{ $element->nombre_provincia}}
                                                    </option>

                                                @else

                                                    <option value="{{ $element->id }}">
                                                        {{ $element->nombre_provincia}}</option>

                                                @endif

                                            @endforeach





                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="localidad_id">Localidad</label>
                                        <br>
                                        <select class="form-control select2 @error('localidad_id') is-invalid @enderror"
                                            name="localidad_id" style="width: 100%;">

                                            <option disabled selected value>Seleccionar</option>

                                            @foreach ($localidades as $element)

                                                @if ($element->id == $datos_personales->localidad_id)

                                                    <option selected value="{{ $datos_personales->localidad_id }}">
                                                        {{ $element->nombre}}
                                                    </option>

                                                @else

                                                    <option value="{{ $element->id }}">
                                                        {{ $element->nombre}}</option>

                                                @endif

                                            @endforeach


                                        </select>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label for="id_estado_civil">Estado civil</label>
                                        <br>
                                        <select class="form-control select2 @error('id_estado_civil') is-invalid @enderror"
                                            name="id_estado_civil" style="width: 100%;">

                                            <option disabled selected value>Seleccionar</option>

                                            @foreach ($estado_civil as $element)

                                                @if ($element->id == $datos_personales->id_estado_civil)

                                                    <option selected value="{{ $datos_personales->id_estado_civil }}">
                                                        {{ $element->nombre_estado_civil}}
                                                    </option>

                                                @else

                                                    <option value="{{ $element->id }}">
                                                        {{ $element->nombre_estado_civil}}</option>

                                                @endif

                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="sexo_id">Sexo</label>
                                        <br>
                                        <select class="form-control select2 @error('sexo_id') is-invalid @enderror"
                                            name="sexo_id" style="width: 100%;">

                                            <option disabled selected value>Seleccionar</option>

                                            @foreach ($sexo as $element)

                                                @if ($element->id == $datos_personales->sexo_id)

                                                    <option selected value="{{ $datos_personales->sexo_id }}">
                                                        {{ $element->nombre_sexo}}
                                                    </option>

                                                @else

                                                    <option value="{{ $element->id }}">
                                                        {{ $element->nombre_sexo}}</option>

                                                @endif

                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="telefono">Teléfono</label>
                                            <input type="text" name="telefono"
                                                class="form-control @error('telefono') is-invalid @enderror"
                                                placeholder="Ingrese telefóno" value="{{$datos_personales->telefono}}" value="{{ old('telefono') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Ingrese email " value="{{$datos_personales->email}}"value="{{ old('email') }}">
                                        </div>

                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="descripcion_domicilio">Domicilio</label>
                                            <input type="text" name="descripcion_domicilio"
                                                class="form-control @error('descripcion_domicilio') is-invalid @enderror"
                                                placeholder="Ingrese domicilio"
                                                value="{{$domicilio[0]->descripcion_domicilio}}" value="{{ old('descripcion_domicilio') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="descripcion_ocupacion">Ocupación</label>
                                            <input type="text" name="descripcion_ocupacion"
                                                class="form-control @error('descripcion_ocupacion') is-invalid @enderror"
                                                placeholder="Ingrese Ocupación"
                                                value="{{$ocupacion[0]->descripcion_ocupacion}}" value="{{ old('descripcion_ocupacion') }}">
                                        </div>
                                    </div>

                                </div>
                                <br>
                                <h4>Datos de la familia </h4>
                                <hr>
                                <br>

                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="apellido_padre">Apellido del padre</label>
                                            <input type="text" name="apellido_padre"
                                                class="form-control @error('apellido_padre') is-invalid @enderror"
                                                placeholder="Ingrese apellido padre"value="{{$dato_familia[0]->apellido_padre}}" value="{{ old('apellido_padre') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="nombre_padre">Nombre del padre</label>
                                            <input type="text" name="nombre_padre"
                                                class="form-control @error('nombre_padre') is-invalid @enderror"
                                                placeholder="Ingrese nombre del padre"value="{{$dato_familia[0]->nombre_padre}}"  value="{{ old('nombre_padre') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="fecha_nacimiento_padre">Fecha de nacimiento del padre</label>
                                            <input type="date" name="fecha_nacimiento_padre"
                                                class="form-control @error('fecha_nacimiento_padre') is-invalid @enderror"
                                                placeholder="Seleccione fecha de nacimiento"
                                                value="{{$dato_familia[0]->fecha_nacimiento_padre}}" value="{{ old('fecha_nacimiento_padre') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="nacionalidad_padre">Nacionalidad del  padre</label>
                                            <input type="text" name="nacionalidad_padre"
                                                class="form-control @error('nacionalidad_padre') is-invalid @enderror"
                                                placeholder="Ingrese nacionalidad del padre"
                                                value="{{$dato_familia[0]->nacionalidad_padre}}" value="{{ old('nacionalidad_padre') }}">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="apellido_madre">Apellido de la madre</label>
                                            <input type="text" name="apellido_madre"
                                                class="form-control @error('apellido_madre') is-invalid @enderror"
                                                placeholder="Ingrese apellido de la madre"value="{{$dato_familia[0]->apellido_madre}}"  value="{{ old('apellido_madre') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="nombre_madre">Nombre de la madre</label>
                                            <input type="text" name="nombre_madre"
                                                class="form-control @error('nombre_madre') is-invalid @enderror"
                                                placeholder="Ingrese nombre de la madre" value="{{$dato_familia[0]->nombre_madre}}" value="{{ old('nombre_madre') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="fecha_nacimiento_madre">Fecha de nacimiento de la madre</label>
                                            <input type="date" name="fecha_nacimiento_madre"
                                                class="form-control @error('fecha_nacimiento_madre') is-invalid @enderror"
                                                placeholder="Seleccione fecha de nacimiento"
                                                value="{{$dato_familia[0]->fecha_nacimiento_madre}}" value="{{ old('fecha_nacimiento_madre') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="nacionalidad_madre">Nacionalidad de la madre</label>
                                            <input type="text" name="nacionalidad_madre"
                                                class="form-control @error('nacionalidad_madre') is-invalid @enderror"
                                                placeholder="Ingrese nacionalidad del padre"
                                                value="{{$dato_familia[0]->nacionalidad_madre}}" value="{{ old('nacionalidad_madre') }}">
                                        </div>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="cantidad_hijos">Cantidad de hijos</label>
                                            <input type="number" name="cantidad_hijos"
                                            value="{{$dato_familia[0]->cantidad_hijos}}"  class="form-control @error('cantidad_hijos') is-invalid @enderror">
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-10">
                                        <label>Detalle</label>
                                        <textarea class="form-control @error ('detalle_hijos') is-invalid @enderror" rows="3"
                                            name="detalle_hijos"
                                            placeholder="ingrese Nombre y Apellido, Edad, Nacionalidad."
                                            required>{{$dato_familia[0]->detalle_hijos}}</textarea>

                                    </div>
                                </div>
                                <br>
                                <h4>Datos legajo</h4>
                                <hr>
                                <br>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="numero_legajo">N° legajo</label>
                                            <input type="text" name="numero_legajo"
                                                class="form-control @error('numero_legajo') is-invalid @enderror"
                                                placeholder="Ingrese N° legajo" value="{{$datos_legajo[0]->numero_legajo}}"  value="{{ old('numero_legajo') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="fecha_ingreso">Fecha De ingreso</label>
                                            <input type="date" name="fecha_ingreso"
                                                class="form-control @error('fecha_ingreso') is-invalid @enderror"
                                                placeholder="Selecciones fecha de ingreso"
                                                value="{{$datos_legajo[0]->fecha_ingreso}}" value="{{ old('fecha_ingreso') }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="categoria">Categoria</label>
                                            <input type="text" name="categoria"
                                                class="form-control @error('categoria') is-invalid @enderror"
                                                placeholder="Ingrese categoria" value="{{$datos_legajo[0]->categoria}}" value="{{ old('categoria') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="id_usuario">Usuario asociado</label>
                                        <br>
                                        <select class="form-control @error('id_usuario') is-invalid @enderror"
                                            name="id_usuario" style="width: 100%;">

                                            <option disabled selected value>Seleccionar</option>

                                            @foreach ($usuarios as $element)

                                                @if ($element->id == $datos_legajo[0]->id_usuario)

                                                    <option selected value="{{ $datos_legajo[0]->id_usuario }}">
                                                    DNI:
                                                    {{ $element->dni_empleado }} | Apellido: {{ $element->apellido }}
                                                    | Nombre: {{ $element->nombre }}
                                                    </option>

                                                @else

                                                    <option value="{{ $element->id }}">
                                                    DNI:
                                                    {{ $element->dni_empleado }} | Apellido: {{ $element->apellido }}
                                                    | Nombre: {{ $element->nombre }}</option>

                                                @endif

                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="cargo_id">Indicar función</label>
                                        <br>
                                        <select class="form-control @error('cargo_id') is-invalid @enderror"
                                            name="cargo_id" style="width: 100%;">

                                            <option disabled selected value>Seleccionar</option>
                                            @foreach ($cargo as $element)

                                            @if ($element->id == $datos_legajo[0]->cargo_id)

                                                <option selected value="{{ $datos_legajo[0]->cargo_id }}">
                                                    {{ $element->nombre_cargo}}
                                                </option>

                                            @else

                                                <option value="{{ $element->id }}">
                                                    {{ $element->nombre_cargo}}</option>

                                            @endif

                                            @endforeach




                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="id_persona" value="{{$id_persona}}">
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
