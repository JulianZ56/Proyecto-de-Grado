@extends('Layouts-Inicio.inicio-superuser')

@section('contenido')

<script src="/js/Filtros/Filtrado_select.js">
</script>

<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo">Editar Solicitante</h2>
        </th>
        <th style="float: right; border:0;"><a class="btn btn-outline-secondary" href="{{ route('superuser.solicitantes-index') }}"><i
                    class="fas fa-undo"></i> Volver</a></div>
        </th>
    </tr>
</table>


@if ($errors->any())
<div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Atencion!</strong> Por favor complete los campos.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if ($message = Session::get('info'))
<div class="alert alert-primary alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Exito!</strong> {{ $message }}
</div>
@endif


<form action="{{ route('superuser.solicitantes-actualizar', $Solicitante->id) }}" method="POST">
    @csrf
    <div class="col-xs-8 col-sm-8 col-md-8">
        <div class="card" style="background-color: rgba(244, 241, 154, 0.249); padding: 7px; word-break: break-all; word-wrap: break-word;">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Seleccione Tipo de Identificacion: </strong>

                        <select name="idIdentificacion" required>
                            <option value="{{ $Solicitante->idIdentificacion }}">{{
                                $Solicitante->tipoIdentificacion->nombreIdentificacion }}</option>
                            <option disabled="disabled">-----Tipo de Identificacion-----</option>
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
                            <option value="{{ $Solicitante->idOcupacion }}">{{ $Solicitante->ocupacion->nombreOcupacion }}</option>
                            <option disabled="disabled">-----Ocupacion-----</option>
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

            <button type="button" data-toggle="collapse" data-target="#demo1" class="btn btn-info btn-sm" style="float: center;"><i
                    class="fas fa-angle-double-down"></i> Editar Nacionalidad</button>

            <hr>
        </div>

        <div id="demo1" class="btn-group; collapse">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="card" style="background-color: rgba(356, 241, 184, 0.249); padding: 7px; word-break: break-all; word-wrap: break-word;">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong><i class="fas fa-plane"></i> Seleccione Nacionalidad: </strong>
                                <select id="select-nacionalidad" required>
                                    <option value="{{ $Solicitante->barrio->comuna->ciudad->departamento->nacionalidad->id }}">{{
                                        $Solicitante->barrio->comuna->ciudad->departamento->nacionalidad->nombre }}</option>
                                    <option disabled="disabled">-----Cambiar Nacionalidad-----</option>
                                    @foreach($nacionalidades as $Nacionalidad)
                                    <option value="{{ $Nacionalidad->id }}">{{ $Nacionalidad->nombre }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <strong><i class="fas fa-building"></i> Seleccione Departamento : </strong>

                                <select id="Departamento" disabled="disabled" required>
                                    <option value="{{ $Solicitante->barrio->comuna->ciudad->departamento->id  }}">{{
                                        $Solicitante->barrio->comuna->ciudad->departamento->nombreDepartamento }}</option>
                                        <option disabled="disabled">>------Cambiar Departamento------<</option> @foreach($departamentos as
                                    $Departamento) <option value="{{ $Departamento->id }}">{{ $Departamento->nombreDepartamento }} </option>
                            @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <strong><i class="fas fa-bus"></i> Seleccione Ciudad : </strong>
                                <select id="Ciudad" disabled="disabled" required>
                                    <option value="{{ $Solicitante->barrio->comuna->ciudad->id  }}">{{
                                        $Solicitante->barrio->comuna->ciudad->nombre }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <strong><i class="fas fa-church"></i> Seleccione Comuna : </strong>
                                <select id="Comuna" disabled="disabled" required>
                                    <option value="{{ $Solicitante->barrio->comuna->id  }}">{{
                                        $Solicitante->barrio->comuna->nombre }}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <strong><i class="fas fa-car"></i> Seleccione Barrio : </strong>
                                <select name="idBarrio" id="Barrio" disabled="disabled" required>
                                    <option value="{{ $Solicitante->barrio->id  }}">{{ $Solicitante->barrio->nombre }}</option>
                                </select>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nombre:</strong>
            <input type="text" value="{{ $Solicitante->nombreSolicitante  }}" name="nombre" class="form-control" placeholder="Nombre Empleado">
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Apellido:</strong>
            <input type="text" value="{{ $Solicitante->apellido  }}" name="apellido" class="form-control" placeholder="Apellido Empleado">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Tipo Persona:</strong>
            <input type="text" value="{{ $Solicitante->tipoPersona  }}" name="tipoPersona" class="form-control"
                placeholder="Tipo Persona">
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Identificacion:</strong>
            <input type="text" value="{{ $Solicitante->numeroIdentificacion  }}" name="numeroIdentificacion" class="form-control"
                placeholder="Identificacion">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Celular:</strong>
            <input type="number" value="{{ $Solicitante->celular  }}" name="celular" class="form-control" placeholder="Celular">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Telefono(Fijo):</strong>
            <input type="number" value="{{ $Solicitante->telefono  }}" name="telefono" class="form-control" placeholder="Fijo">
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <button type="button" data-toggle="collapse" data-target="#demo2" class="btn btn-info btn-sm" style="float: center;"><i
                class="fas fa-angle-double-down"></i> Editar Informacion</button>
        <hr>
    </div>
    <div id="demo2" class="btn-group; collapse">
        <div class="col-xs-8 col-sm-8 col-md-8">
            <div class="card" style="background-color: rgba(502, 241, 144, 0.249); padding: 7px; word-break: break-all; word-wrap: break-word;">

                <div class="form-group">
                    <strong><i class="fas fa-plane"></i> Seleccione Estarto: </strong>
                    <select name="estrato" required>
                        <option value="{{ $Solicitante->estrato }}">{{ $Solicitante->estrato}}</option>
                        <option disabled="disabled">-----Cambiar Estrato-----</option>
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
                        <option value="{{ $Solicitante->vivienda }}">{{ $Solicitante->vivienda}}</option>
                        <option disabled="disabled">---Seleccione Tipo de Vivienda---</option>
                        <option value="Propia">Propia</option>
                        <option value="Arrendada">Arrendada</option>
                        <option value="Otra">Otra</option>
                    </select>
                </div>
                <div class="form-group">
                    <strong><i class="fas fa-venus-mars"></i> Seleccione Genero: </strong>
                    <select name="genero" required>
                        <option value="{{ $Solicitante->genero }}">{{ $Solicitante->genero}}</option>
                        <option disabled=disabled>-----Seleccione Genero-----</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>
                <div class="form-group">
                    <strong><i class="fas fa-male"></i> Seleccione Estado Civil: </strong>
                    <select name="estadoCivil" required>
                        <option value="{{ $Solicitante->estadoCivil }}">{{ $Solicitante->estadoCivil}}</option>
                        <option disabled="disabled">-----Seleccione Estado Civil-----</option>
                        <option value="Soltero">Soltero</option>
                        <option value="Casado">Casado</option>
                        <option value="Union Libre">Union Libre</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Eps:</strong>
            <input type="text" value="{{ $Solicitante->eps }}" name="eps" class="form-control" placeholder="Fijo">
        </div>
    </div>



    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            <input type="email" value="{{ $Solicitante->email }}" name="email" class="form-control" placeholder="Email">
        </div>
    </div>
    <div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-outline-success" style="float: left;"><i class="fas fa-check"></i> Guardar</button>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 text-center">
        <button type="button" data-toggle="collapse" data-target="#demo6" class="btn btn-outline-dark" style="float: right;"><i
                class="fas fa-angle-double-down"></i> Editar Contraseña</button>
    </div>


</form>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div id="demo6" class="btn-group; collapse">
        <form action="{{ route('superuser.solicitantes-editarpass', $Solicitante->id) }}" method="POST">
            @csrf
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Password:</strong>
                    <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                </div>
            </div>
            <br>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-outline-info" style="float: center;"><i class="fas fa-check"></i>
                    Actualizr Password</button>
            </div>

    </div>

    </form>
</div>



@endsection
