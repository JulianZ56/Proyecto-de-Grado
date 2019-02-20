<?php

namespace App\Http\Controllers\login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;

class SuperUserLoginController extends Controller
{
    //
    public function __construct()
	{
		$this->middleware('guest:superuser', ['except' => ['logout']]);
        $this->middleware('guest:empleado', ['except' => ['logout']]);
        $this->middleware('guest:solicitante', ['except' => ['logout']]);
	}
    public function showLoginForm()
    {
    	return view('login.superuser-login');
    }/*
    public function login(Request $request)
    {
    	//validate data
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required|min:6'
    	]);

        if (Auth::guard('empleado')->attempt(['email'=> $request->email,'password'=> $request->password], $request->remember)) {
        //if succesful, then redirect to their intended location

            $correo='macaco@gmail.com';
         
            $empleado=DB::Select('SELECT empleado_jefes.id from empleado_jefes,empleados where empleado_jefes.idEmpleado=empleados.id and empleados.email = "macaco@gmail.com" ');

            if ($empleado=='') {
                return ('hola');
            }
            return redirect()->intended(route('empleado.inicio.login'));
            
        //""""""""""""" redirect back to login
        }

        if (Auth::guard('solicitante')->attempt(['email'=> $request->email,'password'=> $request->password], $request->remember)) {
        //if succesful, then redirect to their intended location
            
            return redirect()->intended(route('solicitante.inicio.login'));
            
        }

    	//attemp to log the user in
    	if (Auth::guard('superuser')->attempt(['email'=> $request->email,'password'=> $request->password], $request->remember)) {
		//if succesful, then redirect to their intended location
    		return redirect()->intended(route('superuser.inicio.login'));
    		
    	}
            return redirect()->back()->withInput($request->only('email','remember'));
    
    }*/
    public function logout()
    {
        Auth::guard('superuser')->logout();
        return  redirect('login');
    }
}
