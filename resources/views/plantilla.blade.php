<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('/') }}/css/plugins/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('/') }}/css/plugins/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ url('/') }}/css/plugins/OverlayScrollbars.min.css">

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

@endauth

@endif

<!-- jQuery -->
<script src="{{ url('/') }}/js/plugins/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ url('/') }}/js/plugins/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ url('/') }}/js/plugins/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ url('/') }}/js/plugins/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ url('/') }}/js/plugins/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('/') }}/js/plugins/demo.js"></script>
{{--Fontawesome--}}
<script src="https://kit.fontawesome.com/8d7c09d224.js" crossorigin="anonymous"></script>

</html>

