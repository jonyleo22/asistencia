<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asistensiaModel extends Model
{
    protected $table ="asistencias";
    protected $fillable =['tipo_asistencia','hora_entrada','hora_salida','estado','id_usuario','fecha'];
}
