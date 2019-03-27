<?php

namespace App\Http\Controllers\login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;

class LoginController extends Controller
{
    public function __construct()
	{
		$this->middleware('guest:superuser', ['except' => ['logout']]);
        $this->middleware('guest:empleado', ['except' => ['logout']]);
        $this->middleware('guest:solicitante', ['except' => ['logout']]);
        $this->middleware('guest:empleadojefe', ['except' => ['logout']]);
	}
    public function showLoginForm()
    {
    	return view('login.superuser-login');
    }
    public function login(Request $request)
    {
    	    $this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required|min:6'
    	]);


        if (Auth::guard('solicitante')->attempt(['email'=> $request->email,'password'=> $request->password], $request->remember)) {
        //if succesful, then redirect to their intended location
            
            return redirect()->intended(route('solicitante.inicio.login'));
            
        }
        if (Auth::guard('superuser')->attempt(['email'=> $request->email,'password'=> $request->password], $request->remember)) {

    		return redirect()->intended(route('superuser.inicio.login')); 
    		
        }
        
         $variable = $request->input('email');
         $empleadoTipo=DB::Select('SELECT empleado_jefes.id from empleado_jefes,empleados where empleado_jefes.idEmpleado=empleados.id and empleados.email = ?',[$variable]);

         if ($empleadoTipo == null) {
             
            if (Auth::guard('empleado')->attempt(['email'=> $request->email,'password'=> $request->password], $request->remember)) {
             //if succesful, then redirect to their intended location
            
                return redirect()->intended(route('empleado.inicio.login'));
                
            }      //""""""""""""" redirect back to login

        }else if (Auth::guard('empleadojefe')->attempt(['email'=> $request->email,'password'=> $request->password], $request->remember)) {
        //if succesful, then redirect to their intended location
            
            return redirect()->intended(route('empleadojefe.inicio.login'));
            
        //""""""""""""" redirect back to login
            
        }
            
            return redirect()->back()->withInput($request->only('email','remember'));
            
    	
    }
}
