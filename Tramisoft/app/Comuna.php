<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
    //
      protected $fillable = [
        'idCiudad', 'nombre',
    ];
    public function ciudad()
	{
		return $this->belongsTo('App\Ciudad', 'idCiudad');
	}
	 public function barrio()
	{
		return $this->hasMany("App\Barrio");
	}
}
