<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numero_articulo');
            $table->text('descripcion_articulo');
            $table->string('operador_articulo');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('articulos');
    }
}
