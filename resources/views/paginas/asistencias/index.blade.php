@extends('plantilla')
@section('content')

    <div class="content-wrapper">
        <div class="jumbotron text-center">
            <h1>Asistencias</h1>
        </div>
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
                                    <label for="dni">Ingrese DNI</label>
                                    <input type="text" name="dni" placeholder="Ingrese DNI" class="form-control @error('dni') is-invalid @enderror" required>
                                    @error('dni')
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
        </div>
    </div>

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
            toastr.danger('EL DNI NO PERTENECE A UN EMPLEADO REGISTRADO')

        </script>

    @endif


@endsection
