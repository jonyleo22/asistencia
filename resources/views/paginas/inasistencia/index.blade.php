@extends('plantilla')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="jumbotron text-center">
                <h1>Inasistencias</h1>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($presentes as $element)
                            <tr>
                                <td>{{ $element->nombre }}</td>
                                <td>{{ $element->apellido }}</td>
                                <td>
                                    <div class='badge badge-success'>Presente</div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
