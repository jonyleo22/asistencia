@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <div class="jumbotron text-center">
        <h1>Administración Decreto</h1>
        <h4>
            <p>Formulario alta de decreto</p>
        </h4>
    </div>
    <div class="container-fluid">
        <div class="row">

            <div class="col-12">
                <div class="card card-primary">

                        <div class="card-body">
                            <form method="POST" action="{{route ('registrar.decreto')}}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="numero_decreto">Decreto</label>
                                        <input type="text" name="numero_decreto"
                                            class="form-control @error('numero_decreto') is-invalid @enderror"
                                            placeholder="Ingrese numero del decreto" value="{{ old('numero_decreto') }}">
                                    </div>
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
</div>
@endsection
