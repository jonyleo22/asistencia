@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="jumbotron text-center">
            <h1>Ausentes con aviso</h1>
        </div>
    </div>
    <div class="card-header">
        <div class="btn-group">

            <div class="">
                    <a href="{{ route('dni.ausente.aviso') }}" type="button" class="btn btn-block btn-outline-primary">
            Generar nota Ausente con aviso</a>
        </div>



    </div>

    <div class="btn-group">
        @if (Auth::User()->roles_id ==1)

        <div class="px-2">
            <a href="{{ route('buscar.dni.ausente.aviso') }}" type="button" class="btn btn-block btn-outline-danger">
                Registrar Ausente con aviso</a>
        </div>

        @endif


    </div>

</div>

@if (Auth::User()->roles_id ==1)

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $datos as $element )

                <td>{{$element->id}}</td>
                <td>{{$element->id_usuario}}</td>
                <td>apenillido</td>
                <td>estado</td>

                @endforeach

            </tbody>
        </table>
    </div>
</div>

@endif

</div>

@if (Session::has('ok-ausente'))

<script>
    toastr.success('Ausente con aviso registrado correctamente')
</script>

@endif
@endsection
