<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ocupacionPersonasModel extends Model
{
    protected $table ="ocupacion_personas";
    protected $fillable = ['id_persona','descripcion_ocupacion','domicilio_ocupacion','telefono_laboral'];
}
