<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class respuestaseguimiento extends Model
{
    //
    public $table = "respuesta_seguimientos";

     protected $fillable = [
        'idSeguimiento','correo', 'nombre' ,'apellido', 'comentario',
    ];

    public function seguimiento()
    {
        return $this->belongsTo("App\Seguimiento",'idSeguimiento');
	}
}
