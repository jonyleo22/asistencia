<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasFamiliaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas_familia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_persona');
            $table->foreign('id_persona')->references('id')->on('personas');
            $table->string('apellido_padre')->nullable();
            $table->string('nombre_padre')->nullable();
            $table->string('fecha_nacimiento_padre')->nullable();
            $table->string('nacionalidad_padre')->nullable();
            $table->string('apellido_madre')->nullable();
            $table->string('nombre_madre')->nullable();
            $table->string('fecha_nacimiento_madre')->nullable();
            $table->string('nacionalidad_madre')->nullable();
            $table->integer('cantidad_hijos')->nullable();
            $table->string('detalle_hijos')->nullable();
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
        Schema::dropIfExists('personas_familia');
    }
}
