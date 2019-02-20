<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barrio extends Model
{
    //
      protected $fillable = [
        'idComuna', 'nombre',
    ];
    public function comuna()
	{
		return $this->belongsTo('App\Comuna','idComuna');
	}
    public function solicitante()
	{
		return $this->hasMany("App\Solicitante");
	}
}
