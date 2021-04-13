@extends('plantilla')
@section('content')
 <div class="content-wrapper">
    <div class="jumbotron text-center">
        <h1>Administración usuarios</h1>
        <h4><p>Formulario alta de usuario</p></h4>
    </div>
 <div class="container-fluid">
    <div class="row justify-content-center">

        <div class="col-6">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Datos del usuarios</h3>
                </div>
                <form role="form">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="Usuario">Usuario</label>
                      <input type="text" class="form-control" placeholder="Ingrese usuario">
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" class="form-control" placeholder="Ingrese email">
                      </div>
                    <div class="form-group">
                      <label for="Contraseña">Contraseña</label>
                      <input type="password" class="form-control" placeholder="Ingrese contraseña">
                    </div>
                  </div>
                  <div class="card-footer text-center">
                    <button type="submit" class="btn btn-success">Guardar</button>
                  </div>
                </form>
              </div>


        </div>

    </div>
 </div>
</div>
@endsection
