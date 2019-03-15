<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Menu Tramisoft</title>



    <!-- Link Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
        crossorigin="anonymous">
    <!-- Nuestro estilo CSS -->
    <link href="{{ asset('/css/Css-Inicio/Inicio-Superuser.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('/img/logotipo.png') }}">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
        crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-3.1.1.js"></script>



</head>

<body>


    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header" style="color">
                <img src="https://www.ge2.co/wp-content/uploads/2018/05/administrador.png" class="rounded" alt="Cinque Terre"
                    width="100" height="100" style="margin-left: 40px">
                <h4 style="padding-top:5px" class="container" align="center" >Bienvenido Admin</h4>
                <p style="color:cyan" class="container" align="center"> Realiza tu gestión</p>
            </div>

            <ul class="list-unstyled components">
                <p>Gestion de Tramites</p>

                <li class="active">
                    <a href="#homeSubmenu" style="padding-left: 10px"><i class="fas fa-home"></i> Inicio</a>

                </li>

                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i
                            class="fas fa-folder-open"></i>
                        Crear</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="{{ route('superuser.nacionalidad-index') }}"> <i class="fa fa-plane"></i>
                                Nacionalidad</a>
                        </li>
                        <li>
                            <a href="{{ route('superuser.departamento-index')}}"> <i class="fas fa-building"></i>
                                Departamento</a>
                        </li>
                        <li>
                            <a href="{{ route('superuser.ciudad-index')}}"> <i class="fas fa-bus"></i>
                                Ciudad</a>
                        </li>
                        <li>
                            <a href="{{ route('superuser.comuna-index')}}"> <i class="fas fa-church"></i>
                                Comuna</a>
                        </li>
                        <li>
                            <a href="{{ route('superuser.barrio-index')}}"> <i class="fas fa-car"></i>
                                Barrio</a>
                        </li>
                        <li>
                            <a href="{{ route('superuser.ocupacion-index')}}"> <i class="fas fa-basketball-ball"></i>
                                Ocupación</a>
                        </li>
                        <li>
                            <a href="{{ route('superuser.tipoidentificacion-index')}}"> <i class="fas fa-address-card"></i>
                                Tipo Identificacion</a>
                        </li>
                        <li>
                            <a href="{{ route('superuser.dependencia-index')}}"> <i class="fas fa-briefcase"></i>
                                Dependencia</a>
                        </li>
                        <li>
                            <a href="{{ route('superuser.catalogotramite-index')}}"> <i class="fas fa-clipboard-list"></i>
                                Catalogo Tramite</a>
                        </li>

                        <li>
                              <a href="{{ route('superuser.documentacion-index')}}"> <i class="fas fa-file-alt"></i> Documentacion</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i
                            class="fas fa-users"></i>
                        Personas</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu2">
                        <li>
                            <a href="{{ route('superuser.admin-index')}}"> <i class="fas fa-user-secret"></i>
                                Administrador</a>
                        </li>
                        <li>
                            <a href="{{ route('superuser.empleados-index') }}"> <i class="fas fa-user-tie"></i>
                                Empleados</a>
                        </li>
                        <li>
                            <a href="{{ route('superuser.empleadojefe-index') }}"> <i class="fas fa-user-lock"></i>
                                Empleados Jefe</a>
                        </li>  
                        <li>
                            <a href="{{ route('superuser.solicitantes-index') }}"> <i class="fas fa-user"></i>
                                Solicitantes</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> <i class="fas fa-calendar-check"></i>
                        Gestionar</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu3">
                        <li>
                            <a href="{{ route('superuser.tramites-index') }}"> <i class="fas fa-clipboard"></i>
                                Tramite</a>
                        </li>

                    </ul>
                </li>
                
            </ul>


        </nav>

        <!-- Page Content Holder -->
        <div id="content">


            <nav class="navbar navbar-expand-lg navbart" style="background-color:rgb(4, 32, 44); color:white">

                <button type="button" id="sidebarCollapse" class="navbar-btn">
                    <span style="background-color:cyan"></span>
                    <span style="background-color:cyan"></span>
                    <span style="background-color:cyan"></span>
                </button>


                <img src="https://i.ibb.co/gSxSB8V/Tramited-01.png" width="230" height="50">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                    aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation" style="color:cyan">
                    <i class="fas fa-sort-down"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>

                    </ul>

                    <div class="dropdown">

                        <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">&nbsp;&nbsp;{{
                            auth()->user()->email }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span class="caret"></span></button>

                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="navigation__item active session">
                                <a href="{{ route('superuser.salir.login') }}" class="is-active barra-hover" onclick="event.preventDefault(); document.getElementById('regresar').submit();">
                                    <i class="fas fa-sign-out-alt" style="padding-left:5px"></i> Cerrar Sesion</a>
                            </li>

                            <form id="regresar" action="{{route('superuser.salir.login')}}" method="POST" style="display:none;">
                                @csrf
                            </form>


                        </ul>
                    </div>

                </div>
            </nav>

            <div class="card" style="background-color: rgba(255, 255, 255, 0.493); padding: 9px; word-break: break-all; word-wrap: break-word;">

                @yield('contenido')

            </div>

        </div>

        <!-- jQuery CDN - Slim version (=without AJAX) -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <!-- Popper.JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
            crossorigin="anonymous"></script>
        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
            crossorigin="anonymous"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').toggleClass('active');
                    $(this).toggleClass('active');
                });
            });

        </script>
        <script>
            $(document).ready(function () {
                $('.dropdown a.test').on("click", function (e) {
                    $(this).next('ul').toggle();
                    e.stopPropagation();
                    e.preventDefault();
                });
            });

        </script>



</body>

</html>
