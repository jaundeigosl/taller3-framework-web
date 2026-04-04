<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{

    protected $fillable = [
        'data_id',
        'telefono_principal',
        'telefono_secundario'
    ];

}