@extends('Layouts-Inicio.inicio-superuser')

@section('contenido')

<script src="/js/Filtros/Filtrado_select.js">
</script>

<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo">Crear Solicitante</h2>
        </th>
        <th style="float: right; border:0;"><a class="btn btn-outline-secondary" href="{{ route('superuser.solicitantes-index') }}"><i
                    class="fas fa-undo"></i> Volver</a></div>
        </th>
    </tr>
</table>

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
    <div class="col-xs-8 col-sm-8 col-md-8">
        <div class="card" style="background-color: rgba(244, 241, 154, 0.249); padding: 7px; word-break: break-all; word-wrap: break-word;">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Seleccione Tipo de Identificacion: </strong>

                        <select name="idIdentificacion" required>
                            <option value="">-----Tipo de Identificacion-----</option>
                            @foreach($tipoidentificaciones as $TipoIdentificacion)
                            <option value="{{ $TipoIdentificacion->id }}">{{ $TipoIdentificacion->nombreIdentificacion
                                }} </option>
                            @endforeach
                        </select>

                    </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Seleccione Ocupacion: </strong>

                        <select name="idOcupacion" required>
                            <option value="">-----Ocupacion-----</option>
                            @foreach($ocupaciones as $Ocupacion)
                            <option value="{{ $Ocupacion->id }}">{{ $Ocupacion->nombreOcupacion
                                }} </option>
                            @endforeach
                        </select>

                    </div>
                            </div>
                            </div>
                            </div>
                            
        <br>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="card" style="background-color: rgba(356, 241, 184, 0.249); padding: 7px; word-break: break-all; word-wrap: break-word;">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong><i class="fas fa-plane"></i> Seleccione Nacionalidad: </strong>
                            <select id="select-nacionalidad" required>
                                <option value="">-----Seleccione Nacionalidad-----</option>
                                @foreach($nacionalidades as $Nacionalidad)
                                <option value="{{ $Nacionalidad->id }}">{{ $Nacionalidad->nombre }} </option>
                                @endforeach
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

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nombre:</strong>
            <input type="text" name="nombreSolicitante" class="form-control" placeholder="Nombre Empleado">
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Apellido:</strong>
            <input type="text" name="apellido" class="form-control" placeholder="Apellido Empleado">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Tipo Persona:</strong>
            <input type="text" name="tipoPersona" class="form-control" placeholder="Tipo Persona">
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Identificacion:</strong>
            <input type="text" name="numeroIdentificacion" class="form-control" placeholder="Identificacion">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Celular:</strong>
            <input type="number" name="celular" class="form-control" placeholder="Celular">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Telefono(Fijo):</strong>
            <input type="number" name="telefono" class="form-control" placeholder="Fijo">
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
        
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Eps:</strong>
            <input type="text" name="eps" class="form-control" placeholder="Fijo">
        </div>
    </div>



    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            <input type="email" name="email" class="form-control" placeholder="Email">
        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Password:</strong>
            <input type="password" name="password" class="form-control" placeholder="Contraseña">
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-outline-success" style="float: left;"><i class="fas fa-check"></i> Guardar</button>
    </div>
    </div>







</form>
@endsection
