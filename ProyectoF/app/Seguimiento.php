<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    //
     protected $fillable = [
        'idTramite', 'EstadoTramite'
    ];
    public function tramite()
	{
		return $this->belongsTo("App\Tramite",'idTramite');
	}

	public function respuestaseguimiento()
	{
		return $this->hasMany('App\Respuestaseguimiento');
	}

	 public function observacion()
	{
		return $this->hasMany("App\Observacion");
	}
}
