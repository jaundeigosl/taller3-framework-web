<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{

    protected $fillable = [
        'data_id',
        'correo_principal',
        'correo_secundario'
    ];

}