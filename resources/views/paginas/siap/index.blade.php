@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="jumbotron text-center">
            <h1>Generar informe SIAP</h1>
            <h4>
                <p>Consultar por fecha</p>
            </h4>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
         <form role="form" method="POST" action="{{route('lista.siap.mes') }}">
            @csrf
            <div class="row">
                <div class="col-lg-2">
                    <label for="fecha_desde">Feche desde:</label>
                    <input type="date" class="form-control" name="fecha_desde" required>
                </div>
                <div class="col-lg-2">
                    <label for="fecha_hasta">Feche hasta:</label>
                    <input type="date" class="form-control" name="fecha_hasta" required>
                </div>
                <div class="col-lg-2">
                   <button type="submit" class="btn btn-secondary" style="margin-top: 30px;">Buscar</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
