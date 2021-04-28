<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('inicio.sistema') }}" class="brand-link">
        <img src="{{ url('/') }}/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Asistencia</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ url('/') }}/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info text-white">
                @if (Auth::User()->roles_id == 1)
                    Administrador
                @endif
                @if (Auth::User()->roles_id == 2)
                    Supervisor
                @endif
                @if  (Auth::User()->roles_id == 3)
                    Empleado
                @endif
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @if (Auth::User()->roles_id == 1)
                 <li class="nav-item">

                     <a href="{{ route('mostrar.index.usuarios') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>Usuarios</p>
                     </a>

                 </li>
                @endif
                @if (Auth::User()->roles_id == 1 || Auth::User()->roles_id == 2 || Auth::User()->roles_id == 3 )
                <li class="nav-item has-treeview menu-close">

                    <a href="#" class="nav-link">

                        <i class="nav-icon far fa-file-alt text-green"></i>
                        <p>
                            Asistencias
                            <i class="right fas fa-angle-left"></i>
                        </p>

                    </a>
                    @if (Auth::User()->roles_id == 1 || Auth::User()->roles_id == 2 || Auth::User()->roles_id == 3 )
                    <ul class="nav nav-treeview">

                        <li class="nav-item">

                            <a href="{{route('asistencias.index')}}" class="nav-link">
                                <i class=" far fa-circle nav-icon"></i>
                                <p>Informar asistencia</p>
                            </a>

                        </li>

                    </ul>
                    @endif

                    @if (Auth::User()->roles_id == 1)
                    <ul class="nav nav-treeview">

                        <li class="nav-item">

                            <a href="{{ route('asistencias.informe') }}" class="nav-link">
                                <i class=" far fa-circle nav-icon"></i>
                                <p>Informes</p>
                            </a>

                        </li>

                    </ul>
                    @endif

                </li>
                @endif

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
