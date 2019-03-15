@extends('Layouts-Inicio.inicio-empleadojefe')

@section('contenido')

<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo">Ver Tramite</h2>
        </th>
        <th style="float: right; border:0;"><a class="btn btn-outline-secondary" href="{{ route('empleadojefe.empleadojefe-index-Proceso') }}"><i
                    class="fas fa-undo"></i> Volver</a></div>
        </th>
    </tr>
</table>


<div class="card" style=" border: black 1px solid;">
    <h5 class="card-header" style="background-color:rgb(34, 66, 59);">
        <div class="titulotramite">{{ $Tramite->catalogotramite->nombreCatalogo }}</div>

    </h5>
    <div class="card-body">
        <div class="container">

            <div class="card" style=" border: black 1px solid;">
                <a class="card-header" style="background-color:rgb(63, 105, 96);">
                    <div class="titulodatos">Datos Solicitante</div>
                </a>
                <div class="card-body">
                    <table class="table table-bordered">


                        <tbody>
                            <tr style="background-color:rgb(104, 170, 156); " align="center">
                                <td class="bordes"><strong>ID del tramite</strong></td>
                                <td class="bordes"><strong>Nombre Del solicitante</strong></td>
                                <td class="bordes"><strong>Apellido del solicitante</strong></td>
                                <td class="bordes"><strong>Numero de Cedula</strong></td>
                            </tr>
                            <tr align="center" style=" border: gray 2px solid">
                                <td class="bordes">{{ $Tramite->id}}</td>
                                <td class="bordes">{{ $Tramite->solicitante->nombreSolicitante }}</td>
                                <td class="bordes">{{ $Tramite->solicitante->apellido }}</td>
                                <td class="bordes">{{ $Tramite->solicitante->numeroIdentificacion }}</td>
                            </tr>
                            <tr style="background-color:rgb(104, 170, 156)" align="center">
                                <td class="bordes"><strong>Email</strong></td>
                                <td class="bordes"><strong>Telefono fijo </strong></td>
                                <td class="bordes"><strong>Telefono Celular</strong></td>
                                <td class="bordes"><strong>Fecha de envio</strong></td>
                            </tr>
                            <tr align="center" style=" border: gray 2px solid">
                                <td class="bordes">{{ $Tramite->solicitante->email }}</td>
                                <td class="bordes">{{ $Tramite->solicitante->telefono }}</td>
                                <td class="bordes">{{ $Tramite->solicitante->celular }}</td>
                                <td class="bordes" s>{{ $Tramite->created_at }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <br>


            <div class="card" style=" border: black 1px solid;">
                <div class="card-header" style="background-color:rgb(63, 105, 96);">

                <div> 

            <table class="table table-bordered" style="border: 0; margin:0px">
                <tr>
                    <td style="float: left; border:0;">
                        <h5 class="titulodatos">Empleado Asignado</h5> 
                    </td>
                    <td style="float: right; border:0;">
                        <a class="btn btn-warning btn-sm" style="float: right" href="{{ route('empleadojefe.reasignar-empleados' , $Tramite->id)}}" method="POST" >
                        <i class="fas fa-plus-square"></i> Reasignar Otro Empleado</a>
                    </td>
                </tr>
            </table>
        
 
            </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">


                        <tbody>
                            <tr style="background-color:rgb(104, 170, 156); " align="center">

                                <td class="bordes"><strong>Nombre Del Empleado</strong></td>
                                <td class="bordes"><strong>Apellido del Empleado</strong></td>
                                <td class="bordes"><strong>Numero de Cedula</strong></td>
                            </tr>
                            <tr align="center" style=" border: gray 2px solid">

                                <td class="bordes">{{ $Tramite->empleado->nombreEmp }}</td>
                                <td class="bordes">{{ $Tramite->empleado->apellidoEmp }}</td>
                                <td class="bordes">{{ $Tramite->empleado->identificacion }}</td>
                            </tr>
                            <tr style="background-color:rgb(104, 170, 156)" align="center">

                                <td class="bordes"><strong>Telefono</strong></td>
                                <td class="bordes"><strong>Correo Eletronico </strong></td>
                                <td class="bordes"><strong>Cargo del Empleado</strong></td>

                            </tr>
                            <tr align="center" style=" border: gray 2px solid">

                                <td class="bordes">{{ $Tramite->empleado->telefonoEmp }} </td>
                                <td class="bordes">{{ $Tramite->empleado->email }}</td>
                                <td class="bordes">{{ $Tramite->empleado->cargoEmp }}</td>

                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <br>






            <table class="table table-light table-striped">
                <tbody>
                    <tr>
                        <td class="columnas2" WIDTH="284" style="border: gray 1px solid;"><strong>Estado del tramite</strong></td>
                        <td class="bordes2">
                            <div class="row">
                                <div class="col-6">{{$Segui->EstadoTramite}}</div>

                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="columnas" style="border: gray 1px solid;"><strong>Observacion</strong></td>
                        <td class="bordes2">
                            <div class="row">


                                @if($encontrado2==true)
                                <div class="col-6">No hay Observaciones por el momento</div>

                                @else
                                <div class="col-6">{{$observar->Observacion}}</div>
                                <div class="col-3">
                                    <a class="btn btn-outline-info" href="{{ route('empleadojefe.empleadojefe-Observaciones', $Tramite->id)}}">
                                        <i class="fas fa-pencil-alt"></i>Ver Observaciones</a>
                                </div>
                                @endif



                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-bordered">
                <tr>
                    <td class="columnas" WIDTH="284" style="border: gray 1px solid;"><strong>Descripcion</strong></td>
                    <td class="bordes2">{{ $Tramite->descripcionTramite }}</td>
                </tr>
                <tr>
                    <td class="columnas2" style="border: gray 1px solid;"><strong>Adjuntos</strong></td>
                    <td class="bordes2">
                     <a class='btn btn-info' href="{{ route('empleadojefe.empleadojefe-ver-Doc',$Tramite->id) }}">Ver Documentos</a>
                 </td>
                </tr>
            </table>



            <div class="card" style=" border: black 1px solid;" id="chat">
                <div class="card-header" style="background-color:rgb(63, 105, 96);">
                    <div class="titulotramite">Comentarios</div>
                </div>

                <ul class="media-list">

                    <li class="media">
                    </li>

                    <li class="media">
                        <div class="media-body">
                            <div class="media">
                                <div class="media-body">

                                    <div id="mensajes">


                                        @foreach ($Respuestas as $Respuesta)

                                        @if ( $Respuesta->correo == $Tramite->solicitante->email )

                                        <div class="mensaje-amigo">
                                            <div class="contenido">
                                                {{ $Respuesta->comentario }}
                                            </div>
                                            <div class="flecha-derecha"></div>
                                            <img src="/img/epa.png" alt="" class="foto" width="40px" height="40px">
                                            <div class="fecha">{{ $Respuesta->nombre }} {{ $Respuesta->created_at }}</div>
                                        </div>

                                        @else

                                        <div class="mensaje-autor">
                                            <img src="/img/soporte.png" alt="" class="foto" width="40px" height="40px">
                                            <div class="flecha-izquierda"></div>
                                            <div class="contenido">
                                                {{ $Respuesta->comentario }}
                                            </div>
                                            <div class="fecha">{{ $Respuesta->nombre }} {{ $Respuesta->created_at }}
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

            </div>

        </div>
    </div>





    @endsection
