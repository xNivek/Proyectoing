<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    protected $fillable = [
        'nombre', 'profesor1', 'rutprofesor1', 'profesor2', 'rutprofesor2', 'user_id',
        'estudiante1', 'rutestudiante1', 'carreraestudiante1',
        'estudiante2', 'rutestudiante2', 'carreraestudiante2',
        'estudiante3', 'rutestudiante3', 'carreraestudiante3',
        'estudiante4', 'rutestudiante4', 'carreraestudiante4',
    ];
}
