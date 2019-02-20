<!DOCTYPE html>
<html>
<head>
	<title>Super Usuario</title>
	<link href="{{ asset('/css/superuser.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="fondo">
      
<div class="bienvenido">Bienvenido</div>
    <br>
<div class="container example5">
  <nav class="navbar navbar-dark bg-success">
    <div class="container-fluid">
      <div class="navbar-header">
        
        <a class="navbar-brand"><img class="este" src="logotipo.png" alt="Dispute Bills" >Tramisoft
        </a>

      </div>
    <div>
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a style="color: black" href="#">Home</a></li>
          <li class="navigation__item active session"><a style="color: black" href="{{route('superuser.salir.login')}}" class="is-active barra-hover" onclick="event.preventDefault(); document.getElementById('regresar').submit();" >Cerrar Sesion</a></li>
         
         <form id="regresar" action="{{route('superuser.salir.login')}}" method="POST" style="display:none;">
          @csrf
            </form>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
  </nav>

<!-- Esta parte es para el layout que se va a manejar-->
</div>

  <img class="logo" src="Tramited-01.png" >
    <br>
  <div class="contenidobtn" >
    <button class="btn btn-success" style="margin: 5px">Crear Empleado</button>
    <button class="btn btn-info" style="margin: 5px">Crear Dependencia</button>
    <button class="btn btn-warning" style="margin: 5px">Crear Catalogo Tramite</button>
    <button class="btn btn-danger" style="margin: 5px">Crear Zonas Nacionales y Regionales</button>
    <button class="btn btn-success" style="margin: 5px">Crear Documentacion para tramites</button>
    
  </div>
  
  <div class="contenidobtn" >
<button class="btn btn-primary" style="margin-top: 5px">Crear ocupaciones y tipo de Identificaciones</button>


    </body>
</html>