@extends('plantilla')
@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="card mt-3">
                <div class="card-body">
                    <form method="POST" action="{{route ('maternidad.registro')}}">
                        @csrf
                        <div class="row text-center">
                            <div class="col-lg-12">
                                <ins>
                                    <h1>Licencia por maternidad</h1>

                                </ins>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <strong>
                                    <h3>
                                        A-Orden de Reconocimiento Médico a Domicilio Nº /{{ $año }}.
                                </strong></h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <h5> Se solicita reconocimiento médico a domicilio para el agente:</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                {{ Auth::User()->apellido }}
                            </div>
                            <div class="col-lg-2">
                                {{ Auth::User()->nombre }}
                            </div>
                            <div class="col-lg-2">
                                {{ $edad }}
                            </div>
                            <div class="col-lg-2">
                                {{ Auth::User()->dni_empleado }}
                            </div>
                            <div class="col-lg-2">
                                {{ $categoria }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                <strong>Apellido</strong>
                            </div>
                            <div class="col-lg-2">
                                <strong>Nombre</strong>
                            </div>
                            <div class="col-lg-2">
                                <strong>Edad</strong>
                            </div>
                            <div class="col-lg-2">
                                <strong>DNI</strong>
                            </div>
                            <div class="col-lg-2">
                                <strong>Categoria</strong>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <strong>Domicilio:</strong> {{ $domicilio }}
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-lg-12">
                                La presente orden es expedida por: <strong>Tesorería General de la Provincia de
                                    Misiones.</strong>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-lg-3">
                                _____________________________________
                            </div>
                            <div class="col-lg-3">
                                _____________________________________
                            </div>
                            <div class="col-lg-2">
                                {{ $hora }}
                            </div>
                            <div class="col-lg-2">
                                {{ $fecha }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <strong>Firma</strong>
                            </div>
                            <div class="col-lg-3">
                                <strong>Aclaración</strong>
                            </div>
                            <div class="col-lg-2">
                                <strong>Hora</strong>
                            </div>
                            <div class="col-lg-2">
                                <strong>Fecha</strong>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p text-right">
                                    _________________________________________
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p text-right ">
                                    <strong>Firma y sello del emisor de la orden.</strong>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                _____________________________________
                            </div>
                            <div class="col-lg-3">
                                _____________________________________
                            </div>
                            <div class="col-lg-3">
                                _____________________________________
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <strong>Recepión</strong>
                            </div>
                            <div class="col-lg-3">
                                <strong>Hora</strong>
                            </div>
                            <div class="col-lg-3">
                                <strong>Fecha</strong>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <p>Se ha dado cumplimiento a la presente Orden con los siguientes resultados: </p>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <strong>
                                    <h3>
                                        A-Orden de Reconocimiento Médico a Domicilio Nº /{{ $año }}.
                                </strong></h3>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12"><strong>El causante se encuentra comprendido en los términos del decreto
                                    Nº: ____________________Art____________________</strong>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <p>Por lo que le corresponde licencia: Desde____________________Hasta____________________
                                </p>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-success">Generar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
