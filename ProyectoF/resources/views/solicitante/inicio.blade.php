<!DOCTYPE html>
<html>
<head>
	<title>Perfin Inicio</title>

  <link href="{{ asset('/css/solicitante.css') }}" rel="stylesheet">
	
</head>
<body>
  <div class="logo">
      <h1 class="titulo">Tramisoft</h1>
  </div>
   <header class="header sticky sticky--top js-header">
  <div class="grid">
    <nav class="navigation">
      <ul class="navigation__list navigation__list--inline">
        <li class="navigation__item"><a href="#" class="is-active act">Home</a></li>
        <li class="navigation__item active session"><a href="{{route('solicitante.salir.login')}}" class="is-active barra-hover" 
        onclick="event.preventDefault(); document.getElementById('regresar').submit();" >Cerrar Sesion</a></li>
      </ul>
    </nav>
  </div>
</header>
<div>
    <h1 class="bienvenida">Bienvenido </h>
</div>
<aside class="sidebar">
    <nav class="nav">
      <ul>
        <li class="barra-lateral"><a href="#"  class="lateral enlaces">Administrar Usuarios</a></li>
        <li class="barra-lateral"><a href="#"  class="lateral enlaces">Administrar Rol</a></li>
        <li class="barra-lateral"><a href="#" class="lateral enlaces">Administrar Accesos</a></li>
      </ul>
    </nav>
  </aside>
       
        <div class="tabla">    
            <table class="table-fill">
            <thead>
                <tr>
                    <th class="text-left">Titulo 1</th>
                    <th class="text-left">Titulo 2</th>
                    <th class="text-left">Titulo 3</th>
                    <th class="text-left">Titulo 4</th>
                    <th class="text-left">Titulo 5</th>
                </tr>
            </thead>
            <tbody class="table-hover">
                <tr>
                    <td class="text-left">Texto ejemplo</td>
                    <td class="text-left">Texto ejemplo</td>
                    <td class="text-left">Texto ejemplo</td>
                    <td class="text-left">Texto ejemplo</td>
                    <td class="text-left">Texto ejemplo</td>
                </tr>
                <tr>
                    <td class="text-left">Texto ejemplo</td>
                    <td class="text-left">Texto ejemplo</td>
                    <td class="text-left">Texto ejemplo</td>
                    <td class="text-left">Texto ejemplo</td>
                    <td class="text-left">Texto ejemplo</td>
                </tr>
                
            </tbody>
            </table>
        </div>

        <form id="regresar" action="{{route('solicitante.salir.login')}}" method="POST" style="display:none;">
          @csrf
        </form>
    </body>
</html>