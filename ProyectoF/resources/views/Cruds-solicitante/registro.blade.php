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

</head>
<body style="background-color: gray;">

<div class="container" style="margin-top: 10px" >
    <div class="card">
        <div class="card-header" style="background-color: lightgreen">
        
            <table class="table table-bordered" style="border: 0; margin:0px">
                    <tr>
                        <th style="border: 0;">
                            <h4 class="titulo">Registra Tu informacion</h4>
                        </th>
                        <th style="float: right; border:0;"><a class="btn btn-outline-secondary" href=""><i
                                        class="fas fa-undo"></i> Volver</a></div>
                        </th>
                    </tr>
            </table>
        </div>
            <div class="card-body">

                

@if ($errors->any())
<div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Atención!</strong> Por favor complete el campo.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('superuser.solicitantes-validar') }}" method="POST">
@csrf

<div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Nombres: </label>
      <input type="text" name="nombreSolicitante" class="form-control" placeholder="Nombres" required>
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Apellidos: </label>
      <input type="text" name="apellido" class="form-control" placeholder="Apellidos">
    </div>
    <div class="form-group col-md-4">
        <label for="inputState">Tipo de Persona:</label>
        <select type="text" name="tipoPersona" class="form-control" placeholder="Tipo Persona">
            <option value="">-----Ocupacion-----</option>
            <option>Natural, etc</option>
        </select>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
        <label for="inputState">Seleccione Tipo de Identificacion:</label>
        <select id="inputState" class="form-control" required>
        <option value="">-----Tipo de Identificacion-----</option>
            <option>...</option>
        </select>
    </div>
    <div class="form-group col-md-3">            
      <label for="inputPassword4">Numero Identificacion: </label>
      <input type="number" name="numeroIdentificacion" class="form-control" placeholder="Cedula">
    </div>
    <div class="form-group col-md-3">            
      <label for="inputPassword4">Celular: </label>
      <input type="number" name="celular" class="form-control" placeholder="Celular">
    </div>
    <div class="form-group col-md-2">
        <label for="inputState">Telefono (Fijo):</label>
        <input type="number" name="telefono" class="form-control" placeholder="Telefono">
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputState">Entidad Promotora de Salud (EPS):</label>
      <input type="text" name="eps" class="form-control" placeholder="Eps Afiliad@">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">Email</label>
      <input type="email" name="email" class="form-control" placeholder="Email">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Password</label>
      <input type="password" name="password" class="form-control" placeholder="Contraseña">
    </div>
</div>


  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputState">Seleccione Ocupacion:</label>
      <select id="inputState" class="form-control" required>
      <option value="">-----Ocupacion-----</option>
        <option>...</option>
      </select>
    </div>
  </div>

  
  
  <button type="submit" class="btn btn-primary">Sign in</button>

<br>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="card" style="background-color: rgba(356, 241, 184, 0.249); padding: 7px; word-break: break-all; word-wrap: break-word;">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong><i class="fas fa-plane"></i> Seleccione Nacionalidad: </strong>
                            <select id="select-nacionalidad" required>
                                <option value="">-----Seleccione Nacionalidad-----</option>
                               
                            </select>
                        </div>
                        <div class="form-group">
                            <strong><i class="fas fa-building"></i> Seleccione Departamento : </strong>
                            <select id="Departamento" disabled="disabled" required>
                            </select>
                        </div>

                        <div class="form-group">
                            <strong><i class="fas fa-bus"></i> Seleccione Ciudad : </strong>
                            <select id="Ciudad" disabled="disabled" required>
                            </select>
                        </div>
                        <div class="form-group">
                            <strong><i class="fas fa-church"></i> Seleccione Comuna : </strong>
                            <select id="Comuna" disabled="disabled" required>
                            </select>
                        </div>

                        <div class="form-group">
                            <strong><i class="fas fa-car"></i> Seleccione Barrio : </strong>
                            <select name="idBarrio" id="Barrio" disabled="disabled" required>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

   
    

    <div class="col-xs-8 col-sm-8 col-md-8">
            <div class="card" style="background-color: rgba(502, 241, 144, 0.249); padding: 7px; word-break: break-all; word-wrap: break-word;">
               
            <div class="form-group">
                <strong><i class="fas fa-plane"></i> Seleccione Estarto: </strong>
                <select name="estrato" required>
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
                <strong><i class="fas fa-home"></i> Seleccione Vivienda: </strong>
                <select name="vivienda" required>
                    <option value="">---Seleccione Tipo de Vivienda---</option>
                    <option value="Propia">Propia</option>
                    <option value="Arrendada">Arrendada</option>
                    <option value="Otra">Otra</option>
                </select>
            </div>
            <div class="form-group">
                <strong><i class="fas fa-venus-mars"></i> Seleccione Genero: </strong>
                <select name="genero" required>
                    <option value="">-----Seleccione Genero-----</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>
            <div class="form-group">
                <strong><i class="fas fa-male"></i> Seleccione Estado Civil: </strong>
                <select name="estadoCivil" required>
                    <option value="">-----Seleccione Estado Civil-----</option>
                    <option value="Soltero">Soltero</option>
                    <option value="Casado">Casado</option>
                    <option value="Union Libre">Union Libre</option>
                </select>
            </div>
                            </div>
                            </div>
        

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-outline-success" style="float: left;"><i class="fas fa-check"></i> Guardar</button>
    </div>
    <br>
    </div>

</form>
<div class="card-footer text-muted" style="background-color: lightgreen">
    2 days ago
  </div>
  </div>
  <br>
  
</div>
</div>

    </div>

</body>
</html>
