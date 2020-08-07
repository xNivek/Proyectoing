<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avance extends Model
{
    protected $fillable = [
        'nombre', 'texto', 'ruta', 'bitacora_id', 'user_id','created_at','updated_at'
    ];
}
