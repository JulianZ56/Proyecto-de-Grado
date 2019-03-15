<?php

namespace App\Http\Controllers\login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class EmpleadoJefe extends Controller
{
    //
    public function __construct()
	{
		$this->middleware('guest:empleadojefe', ['except' => ['logout']]);
	}
    public function showLoginForm()
    {
    	return view('login.empleado-login');
	}
	public function logout()
    {
        Auth::guard('empleadojefe')->logout();
        return  redirect('login');
    }
    /*
    public function login(Request $request)
    {
    	//validate data
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required|min:6'
    	]);

    	//attemp to log the user in
    	if (Auth::guard('empleado')->attempt(['email'=> $request->email,'password'=> $request->password], $request->remember)) {
		//if succesful, then redirect to their intended location


    		$empleado=DB::Select('SELECT empleado_jefes.id from empleado_jefes,empleados where empleado_jefes.idEmpleado=empleados.id and empleados.email = ' '.'$email'');
            



    		if ($empleado=='') {
    			# code...
    		}
    		return redirect()->intended(route('empleado.inicio.login'));
    		
    	}
    	//""""""""""""" redirect back to login
    	return redirect()->back()->withInput($request->only('email','remember'));
    }*/
    
}
