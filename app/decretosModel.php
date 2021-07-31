<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class decretosModel extends Model
{
   protected $table ='decretos';
   protected $fillable = ['numero_decreto','operador_decreto','id_articulos'];
}
