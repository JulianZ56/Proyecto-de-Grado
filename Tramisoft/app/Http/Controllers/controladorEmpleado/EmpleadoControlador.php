<?php

namespace App\Http\Controllers\controladorEmpleado;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmpleadoControlador extends Controller
{
    //
    public function __construct()
    {
    	$this->middleware('auth:empleado');
    }
    public function index()
    {
    	return view('Cruds-empleado.inicio.infoindex');
    }
}
