@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="{{route ('actualizar.estado.licencia')}}" >
                        @csrf
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12 text-center">
                                <strong>
                                    <h3>
                                        Formulario de Alta
                                    </h3>
                                </strong>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12 pull-left">
                                <strong>
                                    <h4>
                                        A-Orden de Reconocimiento Médico a Domicilio Nº {{$n_licencia}}.
                                </strong></h4>
                            </div>
                        </div>
                        <br>
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                <strong>Apellido</strong><br>
                                {{$persona[0]->apellido}}

                            </div>
                            <div class="col-sm-4 invoice-col">
                                <strong>Nombre:</strong><br>
                                {{$persona[0]->nombre}}
                                <br>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                <strong>Edad</strong><br>
                                {{$persona[0]->edad}}

                                <br>
                            </div>
                        </div>
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                <strong>DNI:</strong><br>
                                {{$persona[0]->dni}}

                                <br>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                <strong>Categoría:</strong><br>
                                {{$legajo[0]->categoria}}

                                <br>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                <strong>Domicilio:</strong><br>
                                {{$domicilio[0]->descripcion_domicilio}}

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
                               Por lo que le corresponde Alta Médica, Desde___________Hasta__________
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
                                        B-Orden de Reconocimiento Médico a Domicilio Nº {{$n_licencia}}.
                                </strong></h4>
                            </div>
                        </div>
                        <br>
                        <div class="row invoice-info">
                            <div class="col-sm-12 invoice-col">
                              El agente <strong>{{ $persona[0]->nombre}} {{$persona[0]->apellido}}</strong> categoria <strong>{{ $legajo[0]->categoria }}</strong> D.N.I. N° <strong>{{ $persona[0]->dni }}</strong>
                            </div>
                            <div class="col-sm-12 invoice-col">
                               Que presta servicios en <strong>Tesoreria General de la Provincia de Misiones</strong>,  se encuentra
                               comprendido en los términos del Decreto N°_________Art.N°__________ <br> conforme a ello se le concedió
                                Alta Médica por_________días. Desde____________Hasta____________
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
                                        C-Orden de Reconocimiento Médico a Domicilio Nº {{$n_licencia}}.
                                </strong></h4>
                            </div>
                        </div>
                        <br>
                       <div class="row invoice-info">
                            <div class="col-sm-12 invoice-col">
                              El agente <strong>{{ $persona[0]->nombre}} {{$persona[0]->apellido}}</strong> categoria <strong>{{ $legajo[0]->categoria }}</strong> D.N.I. N° <strong>{{ $persona[0]->dni }}</strong>
                            </div>
                            <div class="col-sm-12 invoice-col">
                               Que presta servicios en <strong>Tesoreria General de la Provincia de Misiones</strong>,  se encuentra
                               comprendido en los términos del Decreto N°_________Art.N°__________ <br> conforme a ello se le concedió
                                Alta Médica por_________días. Desde____________Hasta____________
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
                                @if ($imprimir->estado_licencia == 2 )

                                <a onclick="javascript:window.print()" class="btn btn-default"><i
                                    class="fas fa-print"></i>Imprimir</a>
                                @endif
                                        <button type="submit" class="btn btn-success w-15">Validar</button>
                                        <a href="{{route ('licencia.index')}}" class="btn btn-secondary">Volver</a>
                            </div>

                        </div>
                        <input type="hidden" name="id_licencia" value="{{$n_licencia}}">
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@if (Session::has('ok-imprimir'))
<script>
    toastr.success('Validación éxitosa! Imprima su Alta.')
</script>
@endif
@endsection
