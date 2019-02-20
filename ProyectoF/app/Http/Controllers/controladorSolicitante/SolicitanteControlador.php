<?php

namespace App\Http\Controllers\controladorSolicitante;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SolicitanteControlador extends Controller
{
    //
    //
     public function __construct()
    
    {
    	$this->middleware('auth:solicitante');
    }
    public function index()
    {
    	return view('Layouts-Inicio.inicio-solicitante');
    }
}
