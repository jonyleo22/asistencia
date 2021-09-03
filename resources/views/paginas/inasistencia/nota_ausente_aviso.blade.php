@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mt-3">
            <div class="card-body">
                <div class="row m-auto">
                    <div class="col-lg-12">
                        <span class="m-auto">
                            <strong>

                                <h6>"2021-Año de la Prevención y Lucha contra el COVID-19.
                                    Dengue y demás Enfermedades Intercontagiosas; contra la Violencia
                                    por motivos de Genero en todas sus formas; del Bicentenario
                                    del Fallecimiento del General Martin Miguel de Güemes y de la
                                    Transición de la Década de Acción de los Objetivos de Desarrollo Sostenible"</h6>
                            </strong>
                        </span>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-12 text-left mt-4">
                        <img src="{{url('/')}}/img/logonota.png" alt="">
                    </div>
                </div>
                <br>

                <div class="row text-center">
                    <div class="col-12">
                        <strong>COMUNICACIÓN DE INASISTENCIA CON AVISO</strong>
                    </div>

                </div>
                <div class="row text-right">

                        <div class="col-12">
                            <strong>FECHA: {{ $fecha }}</strong>
                        </div>

                </div>
                <br>
                <div class="row text-left">
                    <div class="col-4">
                        <strong>AL AREA DE PERSONAL:</strong>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-10">
                        POR LA PRESENTE SE COMUNICA LA INASISTENCIA CON AVISO EN EL DÍA DE LA FECHA DEL AGENTE {{ $apellido }} {{ $nombre }} LEGAJO N° {{ $categoria[0]->numero_legajo }}.
                        POR RAZONES DE: {{ $motivo }}.
                    </div>
                </div>

            </div>
            <div class="row no-print text-center">

                <div class="col-12 p-3">
                    <a onclick="javascript:window.print()" class="btn btn-default"><i
                            class="fas fa-print"></i>Imprimir</a>
                    <a href="{{route ('index.ausente.aviso')}}" class="btn btn-secondary">Volver</a>

                </div>

            </div>


        </div>
    </div>
    @endsection
