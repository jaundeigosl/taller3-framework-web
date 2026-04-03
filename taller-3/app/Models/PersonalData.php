<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalData extends Model
{

    protected $fillable = [
        'cedula',
        'nombre',
        'apellido',
        'edad',
        'genero',
        'estado_civil',
        'direccion',
        'cargo'
    ];

}