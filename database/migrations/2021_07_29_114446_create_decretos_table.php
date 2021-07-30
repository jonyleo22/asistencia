<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDecretosTable extends Migration
{

    public function up()
    {
        Schema::create('decretos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_articulos');
            $table->foreign('id_articulos')->references('id')->on('articulos');
            $table->unsignedBigInteger('id_legajo');
            $table->foreign('id_legajo')->references('id')->on('legajos');
            $table->string('numero_decreto');
            $table->string('operador_licencia');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('decretos');
    }
}
