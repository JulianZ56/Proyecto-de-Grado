<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registro Usuario</title>
    <link rel="icon" href="{{ asset('/img/logotipo.png') }}">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>



    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
        crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-3.1.1.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>

</head>

<body style="background: linear-gradient(to top,rgb(255, 255, 255),rgb(218, 252, 215));">

<script src="/js/Filtros/Filtrado_registro.js">
</script>

    <div class="container" style="margin-top: 20px">
        <div class="card" style="border: 1px solid darkgreen">
            <div class="card-header" style="background-image: url(http://www.hdfondos.eu/pictures/2014/0318/1/green-diagonal-lines-wallpaper-60527.jpg);">

                <table class="table table-bordered" style="border: 0; margin:0px">
                    <tr style="margin: 0px;">
                        <th style="border: 0; padding: 0px">
                            <h4 style="color: white">Registra Tu informacion</h4>
                        </th>
                        <th style="float: right; border:0; padding: 0px"><a class="btn btn-light" onclick="location.href='{{ url('/') }}'"><i
                                    class="fas fa-undo"></i> Volver</a>
            </div>
            </th>
            </tr>
            </table>
        </div>
        <div class="card-body" style="background: linear-gradient(to top,rgb(215, 247, 252),rgb(255, 255, 255));">


        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Error!</strong> {{ $message }}
        </div>
        @endif

            <form action="{{ route('Guardar-Usuario') }}" method="POST">
                @csrf

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Nombres: </label>
                        <input type="text" name="nombreSolicitante" class="form-control" placeholder="Nombres" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Apellidos: </label>
                        <input type="text" name="apellido" class="form-control" placeholder="Apellidos" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Tipo de Persona:</label>
                        <select type="text" name="tipoPersona" class="form-control" placeholder="Tipo Persona" required>
                            <option value="">-----Tipo de Persona-----</option>
                            <option>Natural</option>
                            <option>Juridica</option>
                            <option>Otra</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label >Seleccione Tipo de Identificacion:</label>
                        <select name="idIdentificacion" class="form-control" required>
                        <option value="">------Tipo de Identificacion------</option>
                                    @foreach($tipoidentificaciones as $Tipo)
                                    <option value="{{ $Tipo->id }}">{{ $Tipo->nombreIdentificacion }}</option>
                                    @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label >Numero Identificacion: </label>
                        <input type="number" name="numeroIdentificacion" class="form-control" placeholder="Cedula" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label >Celular: </label>
                        <input type="number" name="celular" class="form-control" placeholder="Celular" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label >Telefono (Fijo):</label>
                        <input type="number" name="telefono" class="form-control" placeholder="Telefono" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label >Entidad Promotora de Salud (EPS):</label>
                        <input type="text" name="eps" class="form-control" placeholder="Eps Afiliad@" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label >Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label >Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">

                        <div style="padding: 7px; word-break: break-all; word-wrap: break-word;">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label> Seleccione Nacionalidad: </label>
                                        <select id="select-nacionalidad" class="form-control" required>
                                            <option value="">-----Seleccione Nacionalidad-----</option>
                                            @foreach($nacionalidades as $Nacionalidad)
                                            <option value="{{ $Nacionalidad->id }}">{{ $Nacionalidad->nombre}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label> Seleccione Departamento : </label>
                                        <select id="Departamento" class="form-control" disabled="disabled" required>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label> Seleccione Ciudad : </label>
                                        <select id="Ciudad" class="form-control" disabled="disabled" required>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label> Seleccione Comuna : </label>
                                        <select id="Comuna" class="form-control" disabled="disabled" required>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label> Seleccione Barrio : </label>
                                        <select name="idBarrio" id="Barrio" class="form-control" disabled="disabled"
                                            required>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="form-group col-md-6">

                        <div style=" padding: 7px; word-break: break-all; word-wrap: break-word;">

                            <div class="form-group">
                                <label> Seleccione Estarto: </label>
                                <select name="estrato" class="form-control" required>
                                    <option value="">-----Seleccione Estrato-----</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label> Seleccione Vivienda: </label>
                                <select name="vivienda" class="form-control" required>
                                    <option value="">---Seleccione Tipo de Vivienda---</option>
                                    <option value="Propia">Propia</option>
                                    <option value="Arrendada">Arrendada</option>
                                    <option value="Otra">Otra</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label> Seleccione Genero: </label>
                                <select name="genero" class="form-control" required>
                                    <option value="">-----Seleccione Genero-----</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                    <option value="Otro">Otro</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label> Seleccione Estado Civil: </label>
                                <select name="estadoCivil" class="form-control" required>
                                    <option value="">-----Seleccione Estado Civil-----</option>
                                    <option value="Soltero">Soltero</option>
                                    <option value="Casado">Casado</option>
                                    <option value="Union Libre">Union Libre</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label> Seleccione Ocupacion: </label>
                                <select name="idOcupacion" class="form-control" required>
                                <option value="">------Ocupacion------</option>
                                    @foreach($ocupaciones as $Ocupacion)
                                    <option value="{{ $Ocupacion->id }}">{{ $Ocupacion->nombreOcupacion }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-outline-success btn-block btn-lg" style="float: center;"><i
                            class="fas fa-check"></i> Registrar</button>
                </div>

        </div>
        </form>

        <div class="card-footer text-muted" style="background-image: url(http://www.hdfondos.eu/pictures/2014/0318/1/green-diagonal-lines-wallpaper-60527.jpg);">
        <div style="color:white" align="center">Copyright © 2019 - Team-Tramisoft - All Rights Reserved</div>
        </div>
    </div>
    <br>
    </div>
    </div>
    </div>

</body>

</html>
