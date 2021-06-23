<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vacacionesModel extends Model
{
    protected $table = 'vacaciones';
    protected $fillable = ['id_persona','año_lar','dias_disponible','dias_lar','fecha_desde_lar','fecha_hasta_lar','observacion_lar','operador_lar','ruta_lar'];
}
