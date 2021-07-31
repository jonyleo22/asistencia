@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="jumbotron text-center">
            <h1>Decretos licencia </h1>
            <h4>
                <p>Realice aquí la carga de los decretos </p>
            </h4>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="btn-group">
                    <div class="px-3">
                        <a href="{{ route ('formulario.decreto') }}" type="button"
                            class="btn btn-block btn-outline-primary">
                            Alta decreto</a>
                    </div>
                    <div class="px-1">
                        <a href="{{ route ('formulario.articulo') }}" type="button"
                            class="btn btn-block btn-outline-primary">
                            Alta articulo</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                asdasd
            </div>
        </div>
    </div>
</div>

@endsection
