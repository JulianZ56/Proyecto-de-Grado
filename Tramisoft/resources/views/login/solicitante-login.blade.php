<!DOCTYPE html>
<html>
<head>
	<title>&#128272 Login Solicitante</title>
	<link href="{{ asset('/css/css-logins/solicitante-login.css') }}" rel="stylesheet">

</head>
<body>

	
	 @if(session()->has('flash'))
   		 <div class="alert alert-info">{{session('flash')}}</div>
	 @endif

	<form class="login" action="{{route('solicitante.entrar.login')}}" method="POST">
		{{ csrf_field()}}

	    <h1 class="login-title">Iniciar Sesi&oacute;n</h1>
	    	{!! $errors->first('email','<span class="alerta">:message</span>')!!}
	    <input type="text" class="login-input" placeholder="Direcci&oacute;n de Correo Electronico" name="email" autofocus>
	    	{!! $errors->first('password','<span class="alerta">Ingresa contraseña</span>')!!}
	    <input type="password" class="login-input" placeholder="Contrase&ntilde;a" name="password">
	    

	    <button class="login-button">Iniciar</button>
	  	<p class="login-lost"><a href="{{url('/')}}" class="tramisoft">Tramisoft</a></p>
  </form>

</body>
</html>