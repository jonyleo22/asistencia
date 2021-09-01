@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="jumbotron text-center">
            <h1>Inasistencias</h1>
        </div>
    </div>
    <div class="card-header">
        <div class="btn-group">
            <div class="">
                <a href="{{ route('registrar.inasistencias') }}" type="button" class="btn btn-block btn-outline-danger">
                    Registrar inasistencias</a>
            </div>

                {{--  <div class="px-2">
                    <a href="{{ route('dni.ausente.aviso') }}" type="button" class="btn btn-block btn-outline-primary">
                        Ausente con aviso</a>
                </div>  --}}

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
                            @if ($element->estado == 1)
                            <div class=" badge badge-success">Presente</div>
                            @endif
                            @if ($element->estado == 2)
                            <div class=" badge badge-danger">Ausente</div>
                            @endif
                            @if ($element->estado == 3)
                            <div class=" badge badge-warning">Vacaciones</div>
                            @endif
                            @if ($element->estado == 4)
                            <div class=" badge badge-info">Licencia</div>
                            @endif
                        <td>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@if (Session::has('ok-inasistencias'))

<script>
    toastr.success('Inasistencias registradas correctamente.')
</script>

@endif
@endsection
