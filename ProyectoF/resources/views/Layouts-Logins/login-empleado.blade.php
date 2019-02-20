<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Empleado</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('/img/logotipo.png') }}">

    <link href="{{ asset('/css/Css-Login/Login-Empleado.css') }}" rel="stylesheet">
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url(https://st2.depositphotos.com/1558912/12281/i/950/depositphotos_122812952-stock-photo-several-notebooks-at-office-desk.jpg);">
                    <span class="login100-form-title-1">
                        Inicio de Sesión
                    </span>
                </div>

                @if(session()->has('flash'))
                <div class="alert alert-info">{{session('flash')}}</div>
                @endif

                @yield('contenido')


            </div>
        </div>
    </div>


</body>

</html>
