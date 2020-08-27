<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $fillable = [
        'nombre', 'texto', 'ruta', 'avance_id', 'user_id','created_at','updated_at'
    ];
}
