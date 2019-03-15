<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nacionalidad extends Model
{
    //
    protected $fillable = [
        'nombre',
    ];
	public function departamentos()
	{
		return $this->hasMany('App\Departamento');
	}
}
