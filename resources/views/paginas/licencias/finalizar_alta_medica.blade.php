@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <strong>
                    <h3>
                       Finalizar formulario Alta Médica
                    </h3
                </strong>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Formulario
                    </div>
                    <div class="card-body">
                       <form action="{{route ('registra.finalizar.alta')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="fecha_desde">Fecha desde</label>
                                    <input type="date" name="fecha_desde"
                                        class="form-control @error('fecha_desde') is-invalid @enderror">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="fecha_hasta">Fecha hasta</label>
                                    <input type="date" name="fecha_hasta"
                                        class="form-control @error('fecha_hasta') is-invalid @enderror">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="exampleInputFile">Licencia PDF</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file"
                                                class="custom-file-input @error ('archivo') is-invalid @enderror"
                                                name="archivo" id="archivo">
                                            <label class="custom-file-label" for="archivo"></label>
                                        </div>
                                    </div>
                                    {{-- @error('archivo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong> {{ $message }} </strong>
                                    </span>
                                    @enderror --}}
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id_alta" value="{{$id_alta}}">
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
@endsection
