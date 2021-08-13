@extends('plantilla')
@section('content')

    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="jumbotron text-center">
                <h1>Articulos Asociados</h1>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="tabla-ver-articulos">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Articulo</th>
                                    <th>Descripción</th>
                                </tr>
                            </thead>
                            <tbody>
                            {{-- @foreach ( $datos as $element )
                                    <tr>
                                        <td>{{$element->id}}</td>
                                        <td>{{$element->numero_decreto}}</td>
                                        <td>
                                            <div class="btn-group">
                                                    <div class="">
                                                        <a href="{{route ('editar.decreto',$element->id )}} " class="btn btn-primary btn-sm" title="Editar Decreto"><i
                                                                class="fas fa-pencil-alt"></i></a>
                                                    </div>

                                                    <div class="px-2">
                                                        <a href="{{route ('ver.articulos',$element->id )}} " class="btn btn-secondary btn-sm" target="_blank" title="Ver Articulo"><i
                                                                class="fas fa-search "></i></a>
                                                    </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
