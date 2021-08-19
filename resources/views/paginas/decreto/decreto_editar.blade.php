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
                            <form method="POST" action="{{route ('actualizar.decreto')}}">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="numero_decreto">N° Decreto:</label>
                                        <input type="text" name="numero_decreto"
                                            class="mt-3 form-control @error('numero_decreto') is-invalid @enderror"
                                            placeholder="Ingrese numero del decreto" value="{{$decreto->numero_decreto}}" value="{{ old('numero_decreto') }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="id_articulos" class="d-flex align-content-center">Artículos asociados:
                                        @php
                                        foreach ( $dato_articulos as $element ){

                                        $datos =  json_decode($element, true);
                                           echo '<ul>
                                                <li>N° Art. '.$datos[0]["numero_articulo"].'</li>
                                            </ul>';
                                        }
                                        @endphp

                                    </label>
                                    <select class="form-control select2 @error('id_articulos') is-invalid @enderror"
                                        name="id_articulos[]" multiple style="width: 100%;">

                                        @foreach ($articulos_todos as $element)
                                    <option value="{{ $element->id }}">{{ $element->numero_articulo }}</option>
                                        @endforeach

                                    </select>
                                </div>

                            </div>
                            <input type="hidden" name="id_decreto" value="{{$id_decreto}}">
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
