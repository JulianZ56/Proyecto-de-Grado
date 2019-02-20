<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $fillable = [
       'idNacionalidad' , 'nombreDepartamento',
    ];
	public function nacionalidad()
	{
		return $this->belongsTo('App\Nacionalidad','idNacionalidad');
	}
	public function ciudad()
	{
		return $this->hasMany("App\Ciudad");
	}
}
