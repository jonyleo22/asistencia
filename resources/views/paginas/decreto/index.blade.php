@extends('plantilla')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="jumbotron text-center">
                <h1>Decretos</h1>
                <h4>
                    <p>Realice aquí la administración de Artículos-Decretos</p>
                </h4>
            </div>
        </div>

        <div class="container-fluid">
            <div class="card">
            <div class="card-header">
                <div class="btn-group">

                    <div class="px-3">
                        <a href="{{ route ('formulario.decreto') }}" type="button"
                            class="btn btn-block btn-outline-primary">
                            Alta decreto</a>
                    </div>
                </div>
            </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="tabla-decretos">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>N° Decreto</th>
                                    <th>N° Articulo</th>
                                    <th>Acciónes</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ( $datos as $element )
                                    <tr>
                                        <td>{{$element->id}}</td>
                                        <td>{{$element->numero_decreto}}</td>
                                        <td>{{$element->numero_articulo}}</td>
                                        <td>
                                            <div class="btn-group">


                                                    <div class="">
                                                        <a href="{{route ('editar.decreto',$element->id )}} " class="btn btn-primary btn-sm" title="Editar Decreto"><i
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

    @if (Session::has('Okey-actualizar'))

        <script>
            toastr.success('Decreto actualizado correctamente.')

        </script>

    @endif
@endsection
