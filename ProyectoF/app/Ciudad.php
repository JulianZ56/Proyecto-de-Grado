<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    //
       protected $fillable = [
        'idDepartamento', 'nombre',
    ];
    public function departamento()
	{
		return $this->belongsTo('App\Departamento','idDepartamento');
	}
    public function Comuna()
	{
		return $this->hasMany("App\Comuna");
	}
}
