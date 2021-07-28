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
                                        Formulario de Licencia
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
                        <br>
                        <div class="row invoice-info">
                            <div class="col-sm-6 invoice-col">
                                <strong>_________________</strong><br>
                                Firma
                            </div>
                            <div class="col-sm-5 invoice-col">
                              <strong>Sello del emisor de la orden</strong>
                            </div>
                        </div>
                        <div class="row invoice-info">
                            <div class="col-sm-3 invoice-col">
                                <strong>Recepcón:</strong><br>
                            </div>
                            <div class="col-sm-3 invoice-col">
                                <strong>_________________</strong><br>
                                Hora
                            </div>
                            <div class="col-sm-3 invoice-col">
                                <strong>_______________________</strong><br>
                                Fecha
                            </div>
                        </div>
                        <br>
                        <div class="row invoice-info">
                            <div class="col-sm-9 invoice-col">
                                Se ha dado cumplimiento a la presente Orden con los siguientes resultados:
                            </div>
                        </div>
                        <div class="row invoice-info">
                            <div class="col-sm-12 invoice-col">
                              El causante se encuentra comprendido en los términos del Decreto N°__________ Art. N°________
                            </div>
                            <div class="col-sm-12 invoice-col">
                               Por lo que le corresponde Licencia Médica, Desde___________Hasta__________
                              </div>
                        </div>
                        <br>
                        <br>
                        <div class="row invoice-info">
                            <div class="col-sm-3 invoice-col">
                                _________________<br>
                                Fecha
                            </div>
                            <div class="col-sm-3 invoice-col">
                                <br>
                                <br>
                                <br>
                                <strong>Firma y Sello del Médico</strong>
                            </div>
                        </div>
                        <br>
                       <hr>
                        <div class="row">
                            <div class="col-12 pull-left">
                                <strong>
                                    <h4>
                                        B-Orden de Reconocimiento Médico a Domicilio Nº {{$n_licencia}}/{{ $año }}.
                                </strong></h4>
                            </div>
                        </div>
                        <br>
                        <div class="row invoice-info">
                            <div class="col-sm-12 invoice-col">
                              El agente <strong>{{ Auth::User()->nombre }}</strong> categoria <strong>{{ $categoria }}</strong> D.N.I. N° <strong>{{ Auth::User()->dni_empleado }}</strong>
                            </div>
                            <div class="col-sm-12 invoice-col">
                               Que presta servicios en <strong>Tesoreria General de la Provincia de Misiones</strong>,  se encuentra
                               comprendido en los términos del Decreto N°_________Art.N°__________ <br> conforme a ello se le concedió
                                Licencia Médica por_________días. Desde____________Hasta____________
                              </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="row invoice-info">
                            <div class="col-sm-6 invoice-col">
                                <strong>_________________</strong><br>
                                Fecha
                            </div>
                            <div class="col-sm-5 invoice-col">
                               <br>
                               <br>
                              <strong>Firma y Sello del Sello del Médico</strong>
                                <br>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                           <div class="col-12 pull-left">
                                <strong>
                                    <h4>
                                        C-Orden de Reconocimiento Médico a Domicilio Nº {{$n_licencia}}/{{ $año }}.
                                </strong></h4>
                            </div>
                        </div>
                        <br>
                       <div class="row invoice-info">
                            <div class="col-sm-12 invoice-col">
                              El agente <strong>{{ Auth::User()->nombre }}</strong> categoria <strong>{{ $categoria }}</strong> D.N.I. N° <strong>{{ Auth::User()->dni_empleado }}</strong>
                            </div>
                            <div class="col-sm-12 invoice-col">
                               Que presta servicios en <strong>Tesoreria General de la Provincia de Misiones</strong>,  se encuentra
                               comprendido en los términos del Decreto N°_________Art.N°__________ <br> conforme a ello se le concedió
                                Licencia Médica por_________días. Desde____________Hasta____________
                              </div>
                        </div>
                        <br>
                        <br>
                        <div class="row invoice-info">
                            <div class="col-sm-6 invoice-col">
                                <strong>_________________</strong><br>
                                Fecha
                            </div>
                            <div class="col-sm-5 invoice-col">
                              <strong>Firma y Sello del Sello del Médico</strong>
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
