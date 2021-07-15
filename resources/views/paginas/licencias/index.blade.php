@extends('plantilla')
@section('content')
 <div class="content-wrapper">
    <div class="container-fluid">
        <div class="jumbotron text-center">
            <h1>Licencias Médicas</h1>
            <h4>
                <p>Realice aquí la carga de su licencia médica</p>
            </h4>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="btn-group">
                    <div class="">
                        <a href="{{ route('formulario.maternidad') }}" type="button" class="btn btn-block btn-outline-primary">
                           Nueva licencia por  maternidad</a>
                    </div>
                    <div class="px-3">
                        <a href="{{ route('formulario.enfermedad') }}" type="button" class="btn btn-block btn-outline-primary">
                            Nueva licencia por enfermedad</a>
                    </div>
                    <div class="px-1">
                        <a href="{{ route('formulario.altamedica') }}" type="button" class="btn btn-block btn-outline-primary">
                           Alta médica</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
@endsection
