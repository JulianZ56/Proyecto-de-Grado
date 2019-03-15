@extends('Layouts-Inicio.inicio-superuser')

@section('contenido')

<script src="/js/Filtros/Filtrado_select.js">
</script>

<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo">Editar Barrio</h2>
        </th>
        <th style="float: right; border:0;"><a class="btn btn-outline-secondary" href="{{ route('superuser.barrio-index') }}"><i
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


<form action="{{ route('superuser.barrio-actualizar', $Barrio->id) }}" method="POST">
    @csrf


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre</strong><br>
                <input type="text" name="nombre" value="{{ $Barrio->nombre }}" class="form-control" placeholder="Nombre Comuna"
                    required>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="card" style="background-color: rgba(144, 241, 144, 0.349); padding: 9px; word-break: break-all; word-wrap: break-word;">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <i class="fas fa-question-circle"></i>
                    <strong class="form-group"> INFORMACION ACTUAL:</strong>
                    <button type="button" data-toggle="collapse" data-target="#demo1" class="btn btn-info btn-sm"
                        style="float: right;"><i class="fas fa-angle-double-down"></i> Editar Informacion</button>

                    <hr>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <strong class="form-group"><i class="fas fa-plane"></i> Nacionalidad:</strong>
                    <strong class="mostrar">{{ $Barrio->comuna->ciudad->departamento->nacionalidad->nombre }} </strong>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <strong class="form-group"><i class="fas fa-building"></i> Departamento:</strong>
                    <strong class="mostrar">{{ $Barrio->comuna->ciudad->departamento->nombreDepartamento }} </strong>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <strong class="form-group"><i class="fas fa-bus"></i> Ciudad:</strong>
                    <strong class="mostrar">{{ $Barrio->comuna->ciudad->nombre }} </strong>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <strong class="form-group"><i class="fas fa-church"></i> Comuna:</strong>
                    <strong class="mostrar">{{ $Barrio->comuna->nombre }} </strong>
                </div>

            </div>

        </div>

    </div>
    <br>
    <div id="demo1" class="btn-group; collapse">
        <div class="col-xs-8 col-sm-8 col-md-8">
            <div class="card" style="background-color: rgba(111, 168, 243, 0.349); padding: 9px; word-break: break-all; word-wrap: break-word;">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Cambiar Nacionalidad : </strong>
                        <select id="select-nacionalidad" required>
                            <option value="{{ $Barrio->comuna->ciudad->departamento->nacionalidad->id }}">{{
                                $Barrio->comuna->ciudad->departamento->nacionalidad->nombre }}</option>
                            <option disabled="disabled">>------Cambiar Nacionalidad------<</option>
                                    @foreach($nacionalidades as $Nacionalidad) <option value="{{ $Nacionalidad->id }}">{{
                                    $Nacionalidad->nombre }} </option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group">
                        <strong>Seleccione Departamento : </strong>
                        <select id="Departamento" disabled="disabled" required>
                            <option value="{{ $Barrio->comuna->ciudad->departamento->id }}">{{
                                $Barrio->comuna->ciudad->departamento->nombreDepartamento }}</option>
                            <option disabled="disabled">>------Cambiar Departamento------<</option>
                                    @foreach($departamentos as $Departamento) <option value="{{ $Departamento->id }}">{{
                                    $Departamento->nombreDepartamento }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <strong>Seleccione Ciudad : </strong>
                        <select id="Ciudad" name="idCiudad" disabled="disabled" required>
                            <option value="{{ $Barrio->comuna->ciudad->id }}">{{ $Barrio->comuna->ciudad->nombre }}</option>
                            <option disabled="disabled">>------Cambiar Ciudad------<</option> @foreach($ciudades as
                                    $Ciudad) <option value="{{ $Ciudad->id }}">{{ $Ciudad->nombre }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <strong>Seleccione Comuna : </strong>
                        <select id="Comuna" name="idComuna" disabled="disabled" required>
                            <option value="{{ $Barrio->comuna->id }}">{{ $Barrio->comuna->nombre }}</option>
                            <option disabled="disabled">>------Cambiar Comuna------<</option> @foreach($comunas as
                                    $Comuna) <option value="{{ $Comuna->id }}">{{ $Comuna->nombre }} </option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-outline-info" style="float: right;"><i class="fas fa-edit"></i> Actualizar</button>
    </div>
    </div>

</form>

@endsection
