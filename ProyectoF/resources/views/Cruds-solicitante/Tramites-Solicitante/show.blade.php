@extends('Layouts-Inicio.inicio-solicitante')

@section('contenido')


<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo">Ver Tramite</h2>
        </th>
        <th style="float: right; border:0;"><a class="btn btn-outline-secondary" href="{{ route('solicitante.solicitante-index') }}"><i
                    class="fas fa-undo"></i> Volver</a></div>
        </th>
    </tr>
</table>


<div class="card" style=" border: black 1px solid;">
    <h5 class="card-header" style="background-color:rgb(4, 49, 36); ">
        <div class="titulotramite">{{ $Tramite->catalogotramite->nombreCatalogo }}</div>

    </h5>
    <div class="card-body">
        <div class="container">

            <div class="card" style=" border: black 1px solid;">
                <a class="card-header" style="background-color:rgb(68, 105, 63);">
                    <div class="titulodatos">Tu Informacion</div>
                </a>

                <div class="card-body">

                    <table class="table table-bordered">
                        <tbody>
                            <tr style="background-color:rgb(150, 170, 104);" align="center">
                                <td class="bordes"><strong>ID del tramite</strong></td>
                                <td class="bordes"><strong>Dependencia</strong></td>
                                <td class="bordes"><strong>Nombre Completo del Solicitante</strong></td>
                                <td class="bordes"><strong>Numero de Cedula</strong></td>
                            </tr>
                            <tr align="center">
                                <td class="bordes">{{ $Tramite->id}}</td>
                                <td class="bordes">{{ $Tramite->catalogotramite->dependencia->nombreDependecia }}</td>
                                <td class="bordes">{{ $Tramite->solicitante->nombreSolicitante }} {{ $Tramite->solicitante->apellido
                                    }}</td>
                                <td class="bordes">{{ $Tramite->solicitante->numeroIdentificacion }}</td>
                            </tr>
                            <tr style="background-color:rgb(150, 170, 104);" align="center">
                                <td class="bordes"><strong>Email</strong></td>
                                <td class="bordes"><strong>Telefono fijo </strong></td>
                                <td class="bordes"><strong>Telefono Celular</strong></td>
                                <td class="bordes"><strong>Fecha de envio</strong></td>
                            </tr>
                            <tr align="center">
                                <td class="bordes">{{ $Tramite->solicitante->email }}</td>
                                <td class="bordes">{{ $Tramite->solicitante->telefono }}</td>
                                <td class="bordes">{{ $Tramite->solicitante->celular }}</td>
                                <td class="bordes">{{ $Tramite->created_at }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        <br>
            <div class="card" style=" border: black 1px solid;">
                <a class="card-header" style="background-color:rgb(68, 105, 63);">
                    <div class="titulodatos">Datos Empleado</div>
                </a>

                <div class="card-body">

    @if($encontrado==true)
        <p style="color: red "><strong>Por el momento no se ha asignado un empleado para la Gestion de su Tramite</strong></p>
    @else           
        <table class="table table-bordered">
            <tbody>
                <tr style="background-color:rgb(150, 170, 104);" align="center">  
                    <td class="bordes"><strong>Nombre Del Empleado</strong></td>
                    <td class="bordes"><strong>Apellido del Empleado</strong></td>
                    <td class="bordes"><strong>Numero de Cedula</strong></td>
                </tr>
                <tr align="center">
                    <td class="bordes">{{ $Tramite->empleado->nombreEmp }}</td>
                    <td class="bordes">{{ $Tramite->empleado->apellidoEmp }}</td>
                    <td class="bordes">{{ $Tramite->empleado->identificacion }}</td>
                </tr>
                <tr style="background-color:rgb(150, 170, 104);" align="center">       
                    <td class="bordes"><strong>Telefono</strong></td>
                    <td class="bordes"><strong>Correo Eletronico </strong></td>
                    <td class="bordes"><strong>Cargo del Empleado</strong></td>
                </tr>
                <tr align="center">
                    <td class="bordes"s>Crear telefono en la tabla</td>
                    <td class="bordes">{{ $Tramite->empleado->email }}</td>
                    <td class="bordes">{{ $Tramite->empleado->cargoEmp }}</td>
                </tr>
            </tbody>
        </table>
                    @endif
                </div>
            </div>
        <br>

    

            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td  class="columnas2" style="border: gray 1px solid;"><strong>Estado del tramite</strong></td>
                        <td class="bordes2"> {{ $Segui }}</td>
                    </tr>
                    <tr>
                        <td class="columnas" style="border: gray 1px solid;"><strong>Descripcion</strong></td>
                        <td class="bordes2">{{ $Tramite->descripcionTramite }}</td>
                    </tr>
                    <tr>



                        <td class="columnas2" style="border: gray 1px solid;"><strong>Adjuntos</strong></td>
                        <td class="bordes2">

                    <a class='btn btn-info' href="{{ route('solicitante.solicitante-ver-Doc',$Tramite->id) }}">Ver Documentos</a>

                       
                        </td>


                    </tr>
                </tbody>
            </table>

        <div class="card" style=" border: black 1px solid;" id="chat">
            <div class="card-header" style="background-color:rgb(4, 49, 36); ">
                <div class="titulocomentario">Comentarios</div> 
            </div>

            <ul class="media-list">
                 <li class="media"></li>
                    <li class="media">
                        <div class="media-body">
                            <div class="media">
                                <div class="media-body">
                                    <div id="mensajes">

                                        @foreach ($Respuestas as $Respuesta)

                                        @if ( $Respuesta->correo == $Tramite->solicitante->email )
                                        
                                        <div class="mensaje-amigo">
                                            <div class="contenido">{{ $Respuesta->comentario }}</div>
                                            <div class="flecha-derecha"></div>
                                            <img src="/img/epa.png" alt="" class="foto" width="40px" height="40px">
                                            <div class="fecha">{{ $Respuesta->nombre }} ({{
                                                    $Respuesta->created_at->format('Y-M-d') }}) Hora: ({{
                                                    $Respuesta->created_at->format('H:i:s') }})</div>
                                        </div>
                                        

                                        @else

                                        <div class="mensaje-autor">
                                            <img src="/img/soporte.png" alt="" class="foto" width="40px" height="40px">
                                            <div class="flecha-izquierda"></div>
                                            <div class="contenido">{{ $Respuesta->comentario }}</div>
                                            <div class="fecha">{{ $Respuesta->nombre }} ({{
                                                $Respuesta->created_at->format('Y-M-d') }}) Hora: ({{
                                                $Respuesta->created_at->format('H:i:s') }})</div>
                                        </div> 

                                        @endif
                                        @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                    </li>
                    <br>
                </ul>

                <form action="{{ route('solicitante.solicitante-actualizar-chat', $Tramite->id) }}" method="POST">
                        @csrf
                        <div class="container">
                            <div class="input-group mb-3">
                                <input id="comentarios" name="comentario" type="text" class="form-control" placeholder="Comentario"
                                    required>
                                <div class="input-group-append">

                                    <button class="btn btn-success" type="submit"><i class="fas fa-edit" ></i>Enviar</button>

                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>



    @endsection
