<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class personasModel extends Model
{
    protected $table ="personas";
    protected $fillable = ['tipo_dni_id','sexo_id','provincia_id','localidad_id','id_estado_civil','dni','nombre','apellido','fecha_nacimiento','edad','nacionalidad','telefono','email','otros_contactos','observacion_personas'];
}
