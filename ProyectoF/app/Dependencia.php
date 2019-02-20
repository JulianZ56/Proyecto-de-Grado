<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    //
    protected $fillable = [
        'nombreDependecia', 'descripcionDependencia','perfilDependencia' ,'mision', 'vision', 'telefono',
    ];
	public function catalogotramite()
	{
		return $this->hasMany("App\CatalogoTramite,");
	}
    public function empleado()
	{
		return $this->hasMany('App\Empleado');
	}
}
