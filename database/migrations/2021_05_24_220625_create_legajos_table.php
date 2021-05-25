<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLegajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legajos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->unsignedBigInteger('tipo_dni_id');
            $table->foreign('tipo_dni_id')->references('id')->on('tipo_documento');
            $table->string('dni',8)->unique();
            $table->string('fecha_nacimiento');
            $table->string('edad');
            $table->string('domicilio');
            $table->string('telefono');
            $table->string('numero_legajo');
            $table->string('fecha_ingreso');
            $table->string('categoria');
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('users');
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
        Schema::dropIfExists('legajos');
    }
}
