<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class domicilioPersonasModel extends Model
{
    protected $table ="domicilio_personas";
    protected $fillable = ['descripcion_domicilio','id_persona'];
}
