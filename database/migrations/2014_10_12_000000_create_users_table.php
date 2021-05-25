<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username')->unique();
            $table->string('nombre');
            $table->string('apellido');
            $table->unsignedBigInteger('tipo_dni_id');
            $table->foreign('tipo_dni_id')->references('id')->on('tipo_documento');
            $table->string('dni_empleado',8)->unique();
            $table->string('email')->unique();
            $table->unsignedBigInteger('sector_id');
            $table->foreign('sector_id')->references('id')->on('sectores_empleados');
            $table->unsignedBigInteger('cargo_id');
            $table->foreign('cargo_id')->references('id')->on('cargo_empleado');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('roles_id');
            $table->foreign('roles_id')->references('id')->on('roles');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
