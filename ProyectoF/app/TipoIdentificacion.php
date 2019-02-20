<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoIdentificacion extends Model
{
    //
     protected $fillable = [
       	 'nombreIdentificacion',
    ];
    public function solicitante()
	{
		return $this->hasMany("App\Solicitante");
	}
}
