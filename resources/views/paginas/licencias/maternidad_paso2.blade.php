@extends('plantilla')
@section('content')

    <div class="wrapper">
        Licencia Paso 2
    </div>
    @if (Session::has('okeylicencia'))

    <script>
        toastr.success('Paso 1 registrado correctamente')

    </script>

@endif
@endsection
