<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DAP</title>

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    {{-- TOASTR CSS --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ url('/') }}/css/plugins/adminlte.min.css">

    <link rel="stylesheet" href="{{ url('/') }}/css/plugins/OverlayScrollbars.min.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    {{--Fontawesome--}}
    <script src="https://kit.fontawesome.com/8d7c09d224.js" crossorigin="anonymous"></script>

    <script src="{{ url('/') }}/js/plugins/bs-custom-file-input.min.js"></script>

    <script src="{{ url('/') }}/js/plugins/jquery.overlayScrollbars.min.js"></script>

    <script src="{{ url('/') }}/js/usuarios.js"></script>

    <script src="{{ url('/') }}/js/legajo.js"></script>

    <script src="{{ url('/') }}/js/siap.js"></script>

    <script src="{{ url('/') }}/js/plugins/adminlte.js"></script>

    <script src="{{ url('/') }}/js/plugins/demo.js"></script>

{{-- TOASTR JS --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

  {{-- Botones de datatable js para imprimir, pdf, ver columnas, excel  --}}
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdn.datatables.net/fixedcolumns/3.3.1/js/dataTables.fixedColumns.min.js"></script>
  <script src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js"></script>


    {{--  Marcas de agua para buscar coincidencias  --}}
    <script src="https://cdn.jsdelivr.net/g/mark.js(jquery.mark.min.js),datatables.mark.js"></script>

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
