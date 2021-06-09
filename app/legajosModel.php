<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class legajosModel extends Model
{
    protected $table = 'legajos';
    protected $fillable = ['id_usuario','id_personas','numero_legajo','fecha_ingreso','categoria','operador'];
}
