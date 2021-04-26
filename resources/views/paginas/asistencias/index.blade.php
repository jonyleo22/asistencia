@extends('plantilla')
@section('content')

<div class="content-wrapper">
    <div class="jumbotron text-center">
        <h1>Bienvenido</h1>
        <h4>
            <p>Favor de registrar su asistencia antes de comenzar.</p>
        </h4>
    </div>
    {{--
    @if (!$resultado->isEmpty())
    @if
    @endif
    @endif  --}}

    @if ($resultado->isEmpty())
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <form method="POST" action="{{route ('registrar.asistencia')}}">
                    @csrf
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            Registro de asistencia
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <label for="e/s">Selecione E/S</label>
                                    <select name="tipo_asistencia"
                                        class="form-control @error('tipo_asistencia') is-invalid @enderror" required>
                                        <option disabled selected value>Seleccionar</option>
                                        <option value="1">Entrada</option>
                                        <option value="2">Salida</option>

                                    </select>
                                    @error('tipo_asistencia')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="password">Ingrese su contraseña</label>
                                    <input type="password" name="password" placeholder="Ingrese su contraseña"
                                        class="form-control @error('password') is-invalid @enderror" required>
                                    @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-center">
                            <div>
                                <button type="submit" class="btn btn-info" style="width: 400px;">GUARDAR</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>

    @elseif ($resultado[0]->hora_entrada && $resultado[0]->hora_salida == NULL )
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <form method="POST" action="{{route ('registrar.asistencia')}}">
                    @csrf
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            Registro de asistencia
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <label for="e/s">Selecione E/S</label>
                                    <select name="tipo_asistencia"
                                        class="form-control @error('tipo_asistencia') is-invalid @enderror" required>
                                        <option disabled selected value>Seleccionar</option>
                                        <option value="1">Entrada</option>
                                        <option value="2">Salida</option>

                                    </select>
                                    @error('tipo_asistencia')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="password">Ingrese su contraseña</label>
                                    <input type="password" name="password" placeholder="Ingrese su contraseña"
                                        class="form-control @error('password') is-invalid @enderror" required>
                                    @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-center">
                            <div>
                                <button type="submit" class="btn btn-info" style="width: 400px;">GUARDAR</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
    @endif


    @if (!$resultado->isEmpty())
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card card-primary card-outline">
                    <div class="card-header text-center">
                        <h3>Asistencia registrada</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                             <strong>Hora de entrada registrada:</strong> {{ $resultado[0]->hora_entrada }}
                            </div>
                            <div class="col-lg-6">
                             <strong>Hora de salida registrada:</strong>  {{ $resultado[0]->hora_salida }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if (Session::has('okey-asistencia'))

    <script>
        toastr.success('Asistencia registrada correctamente')

    </script>
    @endif

    @if (Session::has('okey-salida'))

    <script>
        toastr.success('Salida registrada correctamente')

    </script>

    @endif

    @if (Session::has('error'))

    <script>
        toastr.error('LA CONTRASEÑA NO COINCIDE CON NUESTROS REGISTROS')
    </script>

    @endif

    @if (Session::has('error1'))

    <script>
        toastr.error('LA HORA DE ENTRADA YA HA SIDO REGISTRADA')
    </script>

    @endif
</div>
</div>
@endsection
