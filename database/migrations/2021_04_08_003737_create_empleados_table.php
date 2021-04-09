<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('sectores_id');
            $table->foreign('sectores_id')->references('id')->on('sectores');
            $table->string('email_empleado');
            $table->string('telefono_empleado');
            $table->string('nombre_empleado');
            $table->string('apellido_empleado');
            $table->string('direccion_empleado');
            $table->string('dni_empleado',8)->unique();
            $table->string('feha_ingreso_empresa');
            $table->unsignedBigInteger('tipo_documento_id');
            $table->foreign('tipo_documento_id')->references('id')->on('tipo_documento');
            $table->unsignedBigInteger('cargo_id');
            $table->foreign('cargo_id')->references('id')->on('cargo_empleado');
            $table->unsignedBigInteger('funcion_id');
            $table->foreign('funcion_id')->references('id')->on('funcion_empleado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
