<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avance extends Model
{
    protected $fillable = [
        'nombre', 'texto', 'bitacora_id', 'user_id',
    ];
}
