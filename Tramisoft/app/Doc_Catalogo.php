<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doc_Catalogo extends Model
{
   
//
     protected $fillable = [
        'idCatalogoTramite', 'nombreDoc',
    ];

    public function catalogotramite()
	{
		return $this->belongsTo("App\CatalogoTramite",'idCatalogoTramite');
	}
	

}
