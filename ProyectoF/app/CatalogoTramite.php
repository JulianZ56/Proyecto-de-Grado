<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatalogoTramite extends Model
{
    //
     protected $fillable = [
        'idDependencia','nombreCatalogo','numeroDocumentos','descripcionCatalogo',
    ];
    public function tramite()
	{
		return $this->hasMany("App\Tramite");
	}
	public function dependencia()
	{
		return $this->belongsTo("App\Dependencia",'idDependencia');
	}

	public function documentosCat()
	{
		return $this->hasMany("App\Doc_Catalogo");
	}

}
