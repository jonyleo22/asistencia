<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class legajosModel extends Model
{
    protected $table = 'legajos';
    protected $fillable = ['nombre','apellido','fecha_ingreso','tipo_dni_id','dni',
    'email','fecha_nacimiento','domicilio','telefono','numero_legajo','categoria','id_usuario'];
}
