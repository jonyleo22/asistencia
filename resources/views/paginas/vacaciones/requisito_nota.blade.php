@extends('plantilla')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="jumbotron text-center">
                <h1>Ingrese el rango de fecha para LAR</h1>


            </div>
        </div>
        <div class="container-fluid">


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form role="form" method="POST" action="{{ route('nota.lar') }}"  enctype="multipart/form-data">
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
    </div>
@endsection
