<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acceso extends Model
{
    //
     protected $fillable = [
        'nombreRol',
    ];
	public function empleado()
	{
		return $this->hasMany("App\Usuario");
	}
}
