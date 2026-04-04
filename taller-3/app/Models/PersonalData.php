<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalData extends Model
{

    protected $fillable = [
        'user_id',
        'cedula',
        'nombre',
        'apellido',
        'edad',
        'genero',
        'estado_civil',
        'direccion',
        'cargo'
    ];

    public function phone()
    {
        return $this->hasOne(Phone::class, 'data_id');
    }

    public function email()
    {
        return $this->hasOne(Email::class, 'data_id');
    }

}