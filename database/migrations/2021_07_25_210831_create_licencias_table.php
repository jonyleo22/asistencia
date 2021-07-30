<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_legajo');
            $table->foreign('id_legajo')->references('id')->on('legajos');
            $table->unsignedBigInteger('id_decretos')->nullable();
            $table->foreign('id_decretos')->references('id')->on('decretos');
            $table->string('numero_licencia')->unique()->nullable();
            $table->string('hora_licencia');
            $table->string('fecha_licencia');
            $table->date('fecha_desde')->nullable();
            $table->date('fecha_hasta')->nullable();
            $table->string('operador_licencia');
            $table->string('archivo_licencia')->nullable();
            $table->string('tipo_licencia');
            $table->string('estado_licencia');
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
        Schema::dropIfExists('licencias');
    }
}
