<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documentacion extends Model
{
    //
     protected $fillable = [
        'idTramite', 'nombreDocumento', 'documentoPdf',
    ];
    public function tramite()
	{
		return $this->belongsTo("App\Tramite");
	}
}
