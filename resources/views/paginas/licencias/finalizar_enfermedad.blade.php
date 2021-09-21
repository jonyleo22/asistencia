@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <strong>
                    <h3>
                       Finalizar formulario por Licencia Médica
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
                       <form action="{{route ('registrar.finalizar.enfermedad')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="fecha_desde">Fecha desde</label>
                                    <input type="date" name="fecha_desde"
                                        class="form-control @error('fecha_desde') is-invalid @enderror">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="fecha_hasta">Fecha hasta</label>
                                    <input type="date" name="fecha_hasta"
                                        class="form-control @error('fecha_hasta') is-invalid @enderror">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="exampleInputFile">Licencia PDF</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file"
                                                class="custom-file-input @error('archivo') is-invalid @enderror"
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
                            <div class="col-lg-5">
                                <label for="id_decretos">Decreto asociado</label>

                                <select class="form-control select2 @error('id_decretos') is-invalid @enderror"
                                    name="id_decretos" style="width: 100%;">

                                    <option disabled selected value>Seleccionar</option>

                                    @foreach ($decretos as $element)

                                        <option value="{{ $element->id }}">
                                            N° Decreto:
                                            {{ $element->numero_decreto }} </option>


                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="id_enfermedad" value="{{$id_enfermedad}}">
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
