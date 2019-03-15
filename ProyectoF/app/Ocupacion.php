<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ocupacion extends Model
{
    //
      protected $fillable = [
       	 'nombreOcupacion',
    ];
    public function solicitante()
	{
		return $this->hasMany("App\Solicitante");
	}
}
