<?php

namespace App\Http\Controllers\controladorEmpleadoJefe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmpleadoJefeControlador extends Controller
{
    //
    public function __construct()
    {
    	$this->middleware('auth:empleadojefe');
    }
    public function index()
    {
    	return view('Cruds-empleadojefe.inicio.infoindex');
    }
}
