<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comunidade extends Model
{
    protected $fillable = ['calle' , 'numero', 'municipio'];
}
