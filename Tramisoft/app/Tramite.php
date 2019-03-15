<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tramite extends Model
{
    
     protected $fillable = [
        'idSolicitante', 'idCatalogoTramite','idEmpleado' ,'descripcionTramite',
    ];
    public function solicitante()
	{
		return $this->belongsTo("App\Solicitante",'idSolicitante');
	}
	public function documentacion()
	{
		return $this->hasMany("App\Documentacion");
	}
	public function empleado()
	{
		return $this->belongsTo("App\Empleado",'idEmpleado');
	}
	public function catalogotramite()
	{
		return $this->belongsTo("App\CatalogoTramite",'idCatalogoTramite');
	}
	public function seguimiento()
	{
		return $this->hasMany("App\Seguimiento");
	}
}
