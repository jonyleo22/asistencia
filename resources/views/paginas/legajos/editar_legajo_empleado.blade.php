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

        <div class="container-fluid">
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
                        <form role="form" method="POST" action="{{ route('legajo.actualizar.empleado') }}">
                            @method('PUT')
                            @csrf
                            <div class="card-body">


                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="telefono">Teléfono</label>
                                            <input type="text" name="telefono"
                                                class="form-control @error('telefono') is-invalid @enderror"
                                                placeholder="Ingrese telefóno" value="{{$datos_personales->telefono}}" value="{{ old('telefono') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Ingrese email " value="{{$datos_personales->email}}"value="{{ old('email') }}">
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="descripcion_domicilio">Domicilio</label>
                                            <input type="text" name="descripcion_domicilio"
                                                class="form-control @error('descripcion_domicilio') is-invalid @enderror"
                                                placeholder="Ingrese domicilio"
                                                value="{{$domicilio[0]->descripcion_domicilio}}" value="{{ old('descripcion_domicilio') }}">
                                        </div>
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
