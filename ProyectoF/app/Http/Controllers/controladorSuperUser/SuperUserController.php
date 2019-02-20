<?php

namespace App\Http\Controllers\controladorSuperUser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuperUserController extends Controller
{
    //
    public function __construct()
    {
    	$this->middleware('auth:superuser');
    }
    public function index()
    {
    	return view('Layouts-Inicio.inicio-superuser');
    }
}
