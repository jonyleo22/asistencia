<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_persona');
            $table->foreign('id_persona')->references('id')->on('personas');
            $table->string('año_lar')->nullable();
            $table->string('dias_disponible')->nullable();
            $table->string('dias_lar')->nullable();
            $table->string('fecha_desde_lar')->nullable();
            $table->string('fecha_hasta_lar')->nullable();
            $table->string('observacion_lar')->nullable();
            $table->string('operador_lar');
            $table->string('ruta_lar')->nullable();
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
        Schema::dropIfExists('vacaciones');
    }
}
