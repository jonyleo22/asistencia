@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <div class="jumbotron text-center">
        <h1>Administración de Articulo</h1>
        <h4>
            <p>Formulario alta de articulo</p>
        </h4>
    </div>
    <div class="container-fluid">
        <div class="row">

            <div class="col-12">
                <div class="card card-primary">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="numero_articulo">Articulo</label>
                                        <input type="text" name="numero_articulo"
                                            class="form-control @error('numero_articulo') is-invalid @enderror"
                                            placeholder="Ingrese numero del articulo" value="{{ old('numero_articulo') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="form-group col-lg-10">
                                        <label>Descripcion del Articulo</label>
                                        <textarea class="form-control @error ('detalle_articulo') is-invalid @enderror" rows="3"
                                            name="detalle_articulo"
                                            placeholder="ingrese datos del articulo cargado."
                                            required>{{ old('detalle_articulo') }}</textarea>
                                    </div>
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
