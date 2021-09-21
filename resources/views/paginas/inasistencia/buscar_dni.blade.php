@extends('plantilla')
@section('content')

<div class="content-wrapper">
    <div class="container-fluid">

        <div class="jumbotron text-center">
            <h1>Buscar DNI</h1>
            <h4>
                <p>Ingrese DNI del empleado</p>
            </h4>
        </div>
        <div class="card">
            <form method="POST" action="{{ route('dni.form.ausente.aviso') }}">
             @csrf
            <div class="card-body">

                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="dni"> DNI: </label>
                        <input type="text" name="dni"
                            class="form-control @error('dni') is-invalid @enderror"
                            placeholder="Ingrese  DNI" value="{{ old('dni') }}" required>

                    </div>
                </div>
                <div class=" col-lg-12">
                    <label>Motivo: </label>
                    <textarea class="form-control @error('motivo') is-invalid @enderror"
                        rows="3" name="motivo"
                        placeholder="Ingrese el motivo para justificar su ausente con aviso."
                        required>{{ old('motivo') }}</textarea>
                </div>

            </div>
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-success">Generar nota</button>
            </div>

        </form>
        </div>
    </div>

</div>

@if (Session::has('No-Existe'))

        <script>
            toastr.warning('No existe registro del DNI')

        </script>

    @endif
@endsection