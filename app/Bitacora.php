<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    protected $fillable = [
        'nombre', 
        'profesor1_id',
        'profesor2_id',
        'tesista1_id',
        'tesista2_id',
        'tesista3_id',
        'tesista4_id',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

}
