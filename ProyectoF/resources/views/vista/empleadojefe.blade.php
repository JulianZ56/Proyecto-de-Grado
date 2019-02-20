<!DOCTYPE html>
<html>
<head>
	<title>empleado jefe</title>
</head>
<body>
	 <a style="color: black" href="{{route('empleadojefe.salir.login')}}" class="is-active barra-hover" onclick="event.preventDefault(); document.getElementById('regresar').submit();" >Cerrar Sesion</a>
         
         <form id="regresar" action="{{route('empleadojefe.salir.login')}}" method="POST" style="display:none;">
          @csrf
         </form>

	esta es la vista del empleado jefe alv pto el qe lea

</body>
</html>