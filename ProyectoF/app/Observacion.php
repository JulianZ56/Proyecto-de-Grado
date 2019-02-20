<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Observacion extends Model
{
   //
     protected $fillable = [
        'idSeguimiento', 'EstadoActual','Observacion' ,
    ];
    public function seguimiento()
	{
		return $this->belongsTo("App\Seguimiento","idSeguimiento");
	}

	
}
