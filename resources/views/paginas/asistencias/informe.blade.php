@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="jumbotron text-center">
            <h1>Informe</h1>
            <h4>
                <p>Consultar por fecha</p>
            </h4>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
         <form role="form">
            @csrf
            <div class="row">
                <div class="col-lg-2">
                    <label for="fecha_desde">Feche desde</label>
                    <input type="date" class="form-control" name="fecha_desde" id="">
                </div>
                <div class="col-lg-2">
                    <label for="fecha_hasta">Feche hasta</label>
                    <input type="date" class="form-control" name="fecha_hasta" id="">
                </div>
                <div class="col-lg-2">
                    <label for="dni">DNI</label>
                    <input type="text" class="form-control" name="dni" id="">
                </div>
                <div class="col-lg-2">
                   <button type="submit" class="btn btn-secondary" style="margin-top: 30px;">Buscar</button>
                </div>
            </div>
        </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="tabla-informe">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Dni</th>
                            <th>Sector</th>
                            <th>Cargo</th>
                            <th>Hora entrada</th>
                            <th>Hora salida</th>

                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($asistencias as $element)
                        <tr>
                        <td>@php
                           echo date('d-m-Y', strtotime($element->fecha))
                        @endphp</td>
                        <td>{{ $element->nombre }}</td>
                        <td>{{ $element->apellido }}</td>
                        <td>{{ $element->dni_empleado }}</td>
                        <td>{{ $element->nombre_sector }}</td>
                        <td>{{ $element->nombre_cargo }}</td>
                        <td>{{ $element->hora_entrada }}</td>
                        <td>{{ $element->hora_salida }}</td>
                        </tr>
                       @endforeach
                   </tbody>


                </table>


            </div>

        </div>

    </div>
</div>
@endsection
