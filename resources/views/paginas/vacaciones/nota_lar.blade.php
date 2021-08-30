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
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p text-right ">
                                <strong>Posadas {{ $date->day }} de {{ $date->monthName }} de {{ $date->year }}.</strong>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-3 ">
                            <strong>
                                <h5>
                                    Señor Tesorero General de la Provincia de Misiones <br>
                                    Lic. Alberto Cáceres
                                    S______________/______________D.
                            </strong></h5>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <div class="text-right">
                                <strong>Ref:S/Usufructo LAR.</strong>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">

                            <div class="col-lg-12">
                                <h6>Tengo el agrado de dirigirme a Ud. a fin de solicitar la autorización de la licencia anual reglamentaria, corresponde {{$dias}} días LAR disponibles acumulados.
                                hacer uso de ______días a partir del {{$fecha_desde}} hasta el {{$fecha_hasta}} inclusive. </h6>

                            </div>

                    </div>
                    <div class="row text-left mt-5">
                        <div class="col-lg-12">
                            <h6>Sin otro particular, saludo a Ud. atentamente.</h6>
                        </div>
                    </div>
                    <div class="row text-right mt-5">
                        <div class="col-lg-12">
                            ___________________________________________
                        </div>
                    </div>
                    <div class="row text-right mt-5">
                        <div class="col-lg-12">
                           Nombre y apellido: {{Auth::User()->nombre}} {{Auth::User()->apellido}}
                        </div>
                    </div>
                    <div class="row text-right mt-5">
                        <div class="col-lg-12">
                           N° Legajo: {{$numero_legajo}}
                        </div>
                    </div>
                    <div class="row text-right mt-5">
                        <div class="col-lg-12">
                           DNI N°: {{Auth::User()->dni_empleado}}
                        </div>
                    </div>
            </div>



        </div>
        <div class="row no-print">

            <div class="col-12">
                <a onclick="javascript:window.print()" class="btn btn-default"><i
                        class="fas fa-print"></i>Imprimir</a>

            </div>

        </div>
    </div>
</div>
@endsection
