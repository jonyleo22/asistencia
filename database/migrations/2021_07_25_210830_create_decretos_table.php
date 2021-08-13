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
            $table->string('id_articulos');
            $table->string('numero_decreto');
            $table->string('operador_decreto');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('decretos');
    }
}
