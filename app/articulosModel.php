<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class articulosModel extends Model
{
    protected $table ='articulos';
   protected $fillable = ['numero_articulo','operador_articulo','descripcion_articulo'];
}
