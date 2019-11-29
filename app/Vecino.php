<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vecino extends Model
{
    protected $fillable = ['nombre' , 'apellidos', 'dni',
						   'telefono' , 'movil', 'email',
						   'escalera' , 'piso', 'letra', 'comunidades_id', 'cargo',];
}
