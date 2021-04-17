<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DAP</title>

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    {{-- TOASTR CSS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ url('/') }}/css/plugins/adminlte.min.css">

    <link rel="stylesheet" href="{{ url('/') }}/css/plugins/OverlayScrollbars.min.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    {{--Fontawesome--}}
    <script src="https://kit.fontawesome.com/8d7c09d224.js" crossorigin="anonymous"></script>

    <script src="{{ url('/') }}/js/plugins/jquery.overlayScrollbars.min.js"></script>

    <script src="{{ url('/') }}/js/plugins/adminlte.js"></script>

    <script src="{{ url('/') }}/js/plugins/demo.js"></script>

{{-- TOASTR JS --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</head>


@if (Route::has('login'))

@auth

<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse">

    <div class="wrapper">

        @include('modulos.header')

        @include('modulos.sidebar')

        @yield('content')

        @include('modulos.footer')




    </div>

    {{-- <input type="hidden" id="ruta" value="{{url('/')}}"> --}}

</body>

@else

@include('auth.login')

@endauth

@endif

</html>
