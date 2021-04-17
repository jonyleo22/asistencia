@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="jumbotron text-center">
            <h1>Usuarios</h1>
            <h4>
                <p>Realice aquí la administración de usuarios</p>
            </h4>
        </div>
    </div>

    <div class="col-lg-2">
        <div class="card">
            <div class="btn-group">
                <a href="{{route ('formulario_usuario') }}" type="button" class="btn btn-block btn-primary" > Nuevo usuario</a>
            </div>
        </div>
    </div>
</div>
@if (Session::has("ok"))

<script>
    toastr.success('Usuario registrado correctamente')
</script>

@endif

@endsection
