<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LicenciasModel extends Model
{
    protected $table ="licencias";
    protected $fillable = ['id_legajo','numero_licencia','hora_licencia','fecha_licencia','fecha_desde','fecha_hasta','operador_licencia','archivo_licencia','tipo_licencia','estado_licencia'];
}
