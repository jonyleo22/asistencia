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
                                <div class="col-lg-6">
                                    <label for="id_articulos">Artículo asociado</label>
                                    <br>
                                    <select class="form-control select2 @error('id_articulos') is-invalid @enderror"
                                        name="id_articulos" style="width: 100%;">

                                        <option disabled selected value>Seleccionar</option>

                                        @foreach ($articulos as $element)

                                            <option value="{{ $element->id }}">
                                                N° Artículo:
                                                {{ $element->numero_articulo }}</option>
                                            {{-- <option value="{{ $element->id }}"
                                            {{ old('id_usuario') == $element->id ? 'selected' : '' }}>
                                            {{ $element->nombre_tipo_documento }}</option> --}}

                                        @endforeach

                                    </select>
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
