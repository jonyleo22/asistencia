@extends('plantilla')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="jumbotron text-center">
                <h1>Articulo</h1>
                <h4>
                    <p>Realice aquí la administración de Artículos</p>
                </h4>
            </div>
        </div>

        <div class="container-fluid">
            <div class="card">
            <div class="card-header">
                <div class="btn-group">
                <div class="px-1">
                        <a href="{{ route ('formulario.articulo') }}" type="button"
                            class="btn btn-block btn-outline-primary">
                            Alta artículo</a>
                    </div>

                </div>
            </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="tabla-decretos">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>N° Articulo</th>
                                    <th>Acciónes</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ( $datos as $element )
                                    <tr>
                                        <td>{{$element->id}}</td>
                                        <td>{{$element->numero_articulo}}</td>
                                        <td>
                                            <div class="btn-group">

                                                <div class="px-2">
                                                    <a href="{{route ('editar.articulo',$element->id )}} " class="btn btn-info btn-sm" title="Editar articulo"><i
                                                            class="fas fa-pencil-alt"></i></a>
                                                </div>


                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                    </div>

                </div>

            </div>
        </div>
    </div>
    @if (Session::has('okey-decreto'))

        <script>
            toastr.success('Decreto registrado correctamente.')

        </script>

    @endif

    @if (Session::has('okey-articulo'))

        <script>
            toastr.success('Artículo registrado correctamente.')

        </script>

    @endif
@endsection
