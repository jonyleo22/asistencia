<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class personasFamiliaModel extends Model
{
    protected $table = 'legajos';
    protected $fillable = ['id_persona','apellido_padre','nombre_padre','fecha_nacimiento_padre','nacionalidad_padre','apellido_madre','nombre_madre','fecha_nacimiento_madre','nacionalidad_madre','cantidad_hijos','detalle_hijos'];
}
