@extends('plantilla')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="jumbotron text-center">
                <h1>Registrar ausente con aviso</h1>


            </div>
        </div>
        <div class="container-fluid">


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form role="form" method="POST" action="{{ route('registrar.ausente.aviso') }}"  enctype="multipart/form-data">
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
                                    <div class="form-group col-md-6">

                                        <div class="form-group">
                                            <label for="exampleInputFile">Archivo pdf</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file"
                                                        class="custom-file-input @error ('archivo') is-invalid @enderror"
                                                        name="archivo" id="archivo" required>
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
                                <br>



                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-success">Guardar</button>
                                </div>
                                <input type="hidden" name="id_persona" value="{{$id_persona}}">
                                <input type="hidden" name="id_usuario" value="{{ $id_usuario }}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
