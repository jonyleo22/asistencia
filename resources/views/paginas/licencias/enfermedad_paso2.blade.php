@extends('plantilla')

@section('content')

<div class="content-wrapper">

    <section class="content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-12">

                    <div class="invoice p-3 mb-3">
                        <!-- title row -->

                        <div class="row">

                            <div class="col-12 text-center">
                                <strong>
                                    <h3>
                                        Formulario por enfermedad
                                    </h3>
                                </strong>
                            </div>

                        </div>
                        <br>
                        <div class="row">

                            <div class="col-12 pull-left">
                                <strong>
                                    <h4>
                                        A-Orden de Reconocimiento Médico a Domicilio Nº {{$n_licencia}}/{{ $año }}.
                                </strong></h4>
                            </div>

                        </div>
                        <br>

                        <div class="row invoice-info">

                            <div class="col-sm-4 invoice-col">

                                <strong>Apellido</strong><br>
                                {{ Auth::User()->apellido }}


                            </div>

                            <div class="col-sm-4 invoice-col">

                                <strong>Nombre:</strong><br>
                                {{ Auth::User()->nombre }}
                                <br>


                            </div>

                            <div class="col-sm-4 invoice-col">
                                <strong>Edad</strong><br>
                                {{ $edad }}
                                <br>
                                <br>
                            </div>

                        </div>


                        <div class="row invoice-info">

                            <div class="col-sm-4 invoice-col">
                                <strong>DNI:</strong><br>
                                {{ Auth::User()->dni_empleado }}
                                <br>
                            </div>

                            <div class="col-sm-4 invoice-col">
                                <strong>Categoría:</strong><br>
                                {{ $categoria }}
                                <br>
                            </div>

                            <div class="col-sm-4 invoice-col">
                                <strong>Domicilio:</strong><br>
                                {{ $domicilio }}
                                <br>
                            </div>

                        </div>

                        <br>

                        <div class="row">

                            <div class="col-12 pull-left">

                                <h4>
                                    La presente orden es expedida por: <strong>Tesorería General de la Provincia de
                                        Misiones.</strong>
                                </h4>
                            </div>

                        </div>
                        <br>

                        <div class="row invoice-info">

                            <div class="col-sm-3 invoice-col">

                                <strong>_________________</strong><br>
                                Firma


                            </div>

                            <div class="col-sm-3 invoice-col">

                                <strong>_______________________</strong><br>
                                Aclaración
                                <br>


                            </div>

                            <div class="col-sm-3 invoice-col">
                                <strong>{{ $hora }}</strong><br>
                                Hora

                                <br>
                            </div>
                            <div class="col-sm-3 invoice-col">

                                <strong>{{ $fecha }}</strong><br>
                                Fecha

                                <br>

                            </div>

                        </div>
                        <br>
                        <hr>
                        <br>
                        <br>

                        <div class="row invoice-info">

                            <div class="col-sm-6 invoice-col">

                                <strong>_________________</strong><br>
                                Firma


                            </div>

                            <div class="col-sm-3 invoice-col">

                               <br>
                               <br>
                              Sello del emisor de la orden
                                <br>


                            </div>
                        </div>
                        <br><br>

                        <div class="row invoice-info">

                            <div class="col-sm-3 invoice-col">

                                <strong>_________________</strong><br>
                                Firma


                            </div>

                            <div class="col-sm-3 invoice-col">

                                <strong>_______________________</strong><br>
                                Aclaración
                                <br>


                            </div>
                        </div>


                        <!-- Cosito para imprimir-->
                        <br>
                        <div class="row no-print">

                            <div class="col-12">
                                <a onclick="javascript:window.print()" class="btn btn-default"><i
                                        class="fas fa-print"></i>Imprimir</a>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection
