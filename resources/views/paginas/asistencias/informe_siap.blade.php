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
         <form role="form">
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
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="tabla-siap">
                    <thead>
                        <tr>
                            {{--  <th>Categoría</th>  --}}
                            <th>Nombre</th>
                            <th>Apellido</th>
                            {{--  <th>N° Legajo</th>  --}}
                            <th>Cant. asistencias</th>
                            <th>Cant. inasistencias</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($usuarios as $element)
                        <tr>
                            <td>{{ $element->nombre }}</td>
                            <td>{{ $element->apellido }}</td>
                            <td>@php
                                $contar = DB::select("select * from asistencias where estado = 1 and id_usuario = $element->id
                                or estado = 3 and id_usuario = $element->id");
                                $aux = count($contar);
                                echo $aux;
                                @endphp
                            </td>
                            <td>
                                @php
                                $contar = DB::select("select * from asistencias where estado = 2 and id_usuario = $element->id");
                                $aux = count($contar);
                                echo $aux;
                                @endphp
                            </td>
                        </tr>
                        @endforeach

                   </tbody>


                </table>


            </div>

        </div>

    </div>
</div>
@endsection
