@extends('plantilla')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="jumbotron text-center">
                <h1>Legajos</h1>
                <h4>
                    <p>Realice aquí la administración de legajos</p>
                </h4>
            </div>
        </div>

        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="btn-group">
                        <div class="">
                            <a href="{{ route('formulario.legajo') }}" type="button"
                                class="btn btn-block btn-outline-primary">
                                Nuevo legajo</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="tabla-legajo">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Fecha ingreso</th>
                                    <th>Dni</th>
                                    <th>Email</th>
                                    <th>Fecha nacimiento</th>
                                    <th>Edad</th>
                                    <th>Domicilio</th>
                                    <th>Teléfono</th>
                                    <th>N° legajos</th>
                                    <th>Categoria</th>
                                    <th>Acciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datos  as $element)
                                    <tr>
                                        <td>{{$element->id}}</td>
                                        <td>{{$element->nombre}}</td>
                                        <td>{{$element->apellido}}</td>
                                        <td>@php echo date('d/m/Y', strtotime($element->fecha_ingreso)); @endphp</td>
                                        <td>{{$element->dni}}</td>
                                        <td>{{$element->email}}</td>
                                        <td>@php echo date('d/m/Y', strtotime($element->fecha_nacimiento)); @endphp</td>
                                        <td>{{$element->edad}}</td>
                                        <td>{{$element->descripcion_domicilio}}</td>
                                        <td>{{$element->telefono}}</td>
                                        <td>{{$element->numero_legajo}}</td>
                                        <td>{{$element->categoria}}</td>

                                        <td>
                                            <div class="btn-group">

                                                @if (Auth::User()->roles_id == 1)
                                                    <div class="">
                                                        <a href="{{route ('editar.legajo',$element->id )}} " class="btn btn-primary btn-sm" title="Editar Legajo"><i
                                                                class="fas fa-pencil-alt"></i></a>
                                                    </div>
                                                @endif
                                                @if (Auth::User()->roles_id ==3 || Auth::User()->roles_id ==1 )
                                                <div class="">
                                                    <a href="{{route ('editar.legajo.empleado',$element->id )}} " class="btn btn-info btn-sm" title="Editar Legajo"><i
                                                            class="fas fa-pencil-alt"></i></a>
                                                </div>

                                                @endif




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
    @if (Session::has('ok'))

        <script>
            toastr.success('Legajo registrado correctamente')

        </script>

    @endif
    @if (Session::has('Okey-actualizar'))

        <script>
            toastr.success('Legajo actualizado correctamente')

        </script>

    @endif
    @if (Session::has('Okey-actualizar-empleado'))

        <script>
            toastr.success('Legajo de empleadoa ctualizado  correctamente')

        </script>

    @endif
@endsection
