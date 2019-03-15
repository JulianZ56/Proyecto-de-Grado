<?php

namespace App\Http\Controllers\login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class SolicitanteLoginController extends Controller
{
    //
    public function __construct()
	{
		$this->middleware('guest:solicitante', ['except' => ['logout']]);
	}
    public function showLoginForm()
    {
    	return view('login.solicitante-login');
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
    	if (Auth::guard('solicitante')->attempt(['email'=> $request->email,'password'=> $request->password], $request->remember)) {
		//if succesful, then redirect to their intended location
    		return redirect()->intended(route('solicitante.inicio.login'));
    		
    	}
    	//""""""""""""" redirect back to login
    	return redirect()->back()->withInput($request->only('email','remember'));
    }*/
    public function logout()
    {
        Auth::guard('solicitante')->logout();
        return  redirect('login');
    }
}
