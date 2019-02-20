<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Solicitante extends Authenticatable
{
    //
     use Notifiable;
    protected $guard = 'solicitante';

      protected $fillable = [
        'idIdentificacion', 'idOcupacion','idBarrio', 'nombreSolicitante','apellido', 'tipoPersona','numeroIdentificacion', 'celular','telefono', 'estrato','vivienda', 'genero','estadoCivil', 'eps','email', 'password',	
    ];
    public function barrio()
	{
		return $this->belongsTo("App\Barrio", 'idBarrio');
	}
    public function ocupacion()
	{
		return $this->belongsTo("App\Ocupacion", 'idOcupacion');
	}
	public function tipoidentificacion()
	{
		return $this->belongsTo("App\TipoIdentificacion", 'idIdentificacion');
	}
	public function tramite()
	{
		return $this->hasMany("App\Tramite");
	}
	protected $hidden = [
        'password', 'remember_token',
    ];
}
