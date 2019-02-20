@extends('Layouts-Logins.login-empleado')

@section('contenido')

<form class="login100-form" action="{{route('empleado.entrar.login')}}" method="POST">
    {{ csrf_field()}}

    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
        <span class="label-input100">Email</span>
        <input class="input100" type="email" name="email" placeholder="Ingrese su Correo Electónico">
        <span class="focus-input100"></span>
    </div>

    <div class="wrap-input100 m-b-18" data-validate="Password is required">
        <span class="label-input100">Password</span>
        <input class="input100" type="password" name="password" placeholder="Ingrese Contraseña">
        <span class="focus-input100"></span>
    </div>

    <br><br>

    <div class="container-login100-form-btn" style="margin-top:20px">
        <button class="login100-form-btn"> Ingresar</button>
        <input type='button' class="login100-form-btn" value='Volver' onclick="location.href='{{ url('/') }}'" style="margin-left:10px" />

    </div>
	<br><br>
	
</form>

@endsection
