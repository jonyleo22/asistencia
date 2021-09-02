<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AusenteAvisoModel extends Model
{
    protected $table = 'ausentes_aviso';
    protected $fillable = ['ruta_ausente_aviso','id_usuario'];
}
