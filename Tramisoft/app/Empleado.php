<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Authenticatable
{
    //
	use Notifiable;
	
    protected $guard = 'empleado';
    
    protected $fillable = [
       'idDependencia', 'nombreEmp', 'apellidoEmp','identificacion' ,'cargoEmp', 'email', 'password', 'telefonoEmp',
    ];
	public function acceso()
	{
		return $this->belongsTo("App\Acceso");
	}	
	public function dependencias()
	{
		return $this->belongsTo('App\Dependencia','idDependencia');
	}
	public function tramite()
	{
		return $this->hasMany("App\Tramite");
	}
	public function empleadojefe()
	{
		return $this->hasOne("App\EmpleadoJefe");
	}

	 protected $hidden = [
        'password', 'remember_token',
    ];
}

