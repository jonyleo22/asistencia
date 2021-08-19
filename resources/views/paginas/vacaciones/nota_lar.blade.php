@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mt-3">
            <div class="card-body">
                <form action="#">
                    @csrf
                    <div class="row text-right">
                        <div class="col-lg-2"> </div>
                        <div class="col-lg-9">
                            <strong>
                                <h8>"2021-Año de la Prevención y Lucha contra el COVID-19.
                                    Dengue y demás Enfermedades Intercontagiosas; contra la Violencia
                                    por motivos de Genero en todas sus formas; del Bicentenario
                                    del Fallecimiento del General Martin Miguel de Güemes y de la
                                    Transición de la Década de Acción de los Objetivos de Desarrollo Sostenible"</h8>
                            </strong>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p text-right ">
                                <strong>Posadas 19 de Agosto del 2021.</strong>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
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
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p text-right ">
                                <strong>Ref:S/Usufructo LAR.</strong>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <br>
                        <div class="row text-center">
                        <div class="col-lg-1">

                            </div>
                            <div class="col-lg-10">
                                <h7>Tengo el agrado de dirigirme a Ud. a fin de solicitar autorización para hacer uso de ______________ Dias de LAR/____________
                                a partir del ____/____/____      y hasta el dia ___/___/___ inclusive. </h7>

                            </div>
                        </div>
                    </div>
                    <div class="row text-right">
                        <div class="col-lg-12">
                            <h7>Sin otro particular, saludo a Ud. atentamente.</h7>
                        </div>
                    </div>

                </form>


            </div>
            <div class="card-footer text-center">
                        <button type="submit" class="btn btn-success">Generar</button>
                    </div>
        </div>
    </div>
</div>
@endsection
