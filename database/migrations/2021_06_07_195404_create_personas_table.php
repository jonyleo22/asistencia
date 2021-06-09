<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tipo_dni_id');
            $table->foreign('tipo_dni_id')->references('id')->on('tipo_documento');
            $table->unsignedBigInteger('sexo_id');
            $table->foreign('sexo_id')->references('id')->on('sexo');
            $table->unsignedBigInteger('provincia_id');
            $table->foreign('provincia_id')->references('id')->on('provincias');
            $table->unsignedBigInteger('localidad_id');
            $table->foreign('localidad_id')->references('id')->on('localidades');
            $table->unsignedBigInteger('id_estado_civil');
            $table->foreign('id_estado_civil')->references('id')->on('estado_civil');
            $table->string('dni',8)->unique();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('fecha_nacimiento');
            $table->string('edad');
            $table->string('nacionalidad');
            $table->string('telefono')->nullable();
            $table->string('email')->nullable();
            $table->string('otros_contactos')->nullable();
            $table->string('observacion_personas')->nullable();

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
        Schema::dropIfExists('personas');
    }
}
