<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
	protected $fillable = ['notas' , 'fecha', 'id_user'];
    protected $table = "agenda";
}

