<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpleadoJefe extends Model
{
    public $table = "empleado_jefes";
    
    protected $fillable = [
        'idEmpleado',
    ];
	public function empleado()
	{
        
		return $this->belongsTo("App\Empleado",'idEmpleado');
	}
}
