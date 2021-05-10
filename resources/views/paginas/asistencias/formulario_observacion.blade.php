@extends('plantilla')
@section('content')
<div class="content-wrapper">

    <div class="card mt-3 ml-3 mr-3">
        <div class="col-lg-12">
            <form role="form" method="POST" action="{{ route('registrar.observacion') }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group col-lg-12">
                        <label>Observaciones </label>
                        <textarea class="form-control @error ('observacion_asistencia') is-invalid @enderror" rows="3"
                            name="observacion_asistencia"
                            placeholder="ingrese observaciones, en caso de no contar con los datos favor de escribir S/D"
                            required>{{ old('observacion_asistencia') }}</textarea>
                        @error('observacion_asistencia')
                        <span class="invalid-feedback" role="alert">
                            <strong> {{ $message }} </strong>
                        </span>
                        @enderror

                    </div>
                </div>
                    <div class="card-footer text-center">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-success" >Guardar</button>
                        </div>
                    </div>
                    <input type="hidden" name="id_asistencia" value="{{ $id_asistencia }}">
            </form>
        </div>

    </div>
</div>
@endsection
