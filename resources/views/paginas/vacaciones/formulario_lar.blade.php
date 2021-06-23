@extends('plantilla')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="jumbotron text-center">
                <h1>Licencia anual reglamentaria</h1>


            </div>
        </div>
        <div class="container-fluid">


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form role="form" method="POST" action="{{route ('registrar.vacaciones')}}"  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label for="fecha_desde_lar">Feche desde:</label>
                                        <input type="date" class="form-control" name="fecha_desde_lar" required>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="fecha_hasta_lar">Feche hasta:</label>
                                        <input type="date" class="form-control" name="fecha_hasta_lar" required>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="dias_lar">Cantidad de días:</label>
                                        <input type="number" class="form-control" name="dias_lar">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class=" col-lg-12">
                                        <label>Observaciones: </label>
                                        <textarea class="form-control @error('observacion_lar') is-invalid @enderror"
                                            rows="3" name="observacion_lar"
                                            placeholder="ingrese observaciones, en caso de no contar con los datos favor de escribir S/D"
                                            required>{{ old('observacion_lar') }}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">

                                        <div class="form-group">
                                            <label for="exampleInputFile">Archivo pdf</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file"
                                                        class="custom-file-input @error ('archivo') is-invalid @enderror"
                                                        name="archivo" id="archivo">
                                                    <label class="custom-file-label" for="archivo"></label>

                                                </div>

                                            </div>
                                            @error('archivo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong> {{ $message }} </strong>
                                            </span>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-success">Guardar</button>
                                </div>
                                <input type="hidden" name="id_persona" value="{{$id_persona}}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
