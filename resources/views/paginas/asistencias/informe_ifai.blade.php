@extends('plantilla')
@section('content')
 <div class="content-wrapper">

    <div class="container">
        <h2></h2>
        <table class="table">
          <thead>
            <tr>
              <th>N° legajo</th>
              <th>Apellido</th>
              <th>Nombre</th>
              <th>Cant. asistencias</th>
              <th>Cant. inasistencias</th>
              <th>Dias de licencia</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($usuario as $element)

               <tr>
                 <td> </td>
                 <td>{{$element->apellido}}</td>
                 <td>{{$element->nombre}}</td>
                 <td> </td>
                 <td> </td>
                 <td> </td>
               </tr>

              @endforeach

          </tbody>
        </table>
      </div>


 </div>

@endsection
