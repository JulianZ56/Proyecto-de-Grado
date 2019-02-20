@extends('Layouts-Inicio.inicio-superuser')

@section('contenido')

<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo">Editar Empleado</h2>
        </th>
        <th style="float: right; border:0;"><a class="btn btn-outline-secondary" href="{{ route('superuser.empleados-index') }}"><i
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


<form action="{{ route('superuser.empleados-actualizar', $Empleado->id) }}" method="POST">
    @csrf


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Seleccione Dependencia: </strong>

                <select name="idDependencia" required>
                    <option value="{{ $Empleado->idDependencia }}">{{ $Empleado->dependencias->nombreDependecia }}</option>
                    <option disabled="disabled">>-----Cambiar Dependencia-----<</option>
                    @foreach($dependencias as $Dependencia)
                    <option value="{{ $Dependencia->id }}">{{ $Dependencia->nombreDependecia }} </option>
                    @endforeach
                </select>

            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                <input type="text" name="nombreEmp" value="{{ $Empleado->nombreEmp }}" class="form-control" placeholder="Nombre Empleado" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Apellido:</strong>
                <input type="text" name="apellidoEmp" value="{{ $Empleado->apellidoEmp }}" class="form-control"
                    placeholder="Apellido Empleado" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cargo:</strong>
                <input type="text" name="cargoEmp" value="{{ $Empleado->cargoEmp }}" class="form-control" placeholder="Cargo Empleado" required>
            </div>
        </div>

        <div class="col-xs-5 col-sm-5 col-md-5 text-center">
            <button type="submit" class="btn btn-outline-info" style="float: center;"><i class="fas fa-check"></i>
                Actualizar Datos</button>

            <br><br>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">



            </div>
        </div>
</form>

<div class="col-xs-6 col-sm-6 col-md-6 text-center">
    <button type="button" data-toggle="collapse" data-target="#demo1" class="btn btn-outline-dark" style="float: left;"><i
            class="fas fa-angle-double-down"></i> Editar Contraseña</button>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div id="demo1" class="btn-group; collapse">
        <form action="{{ route('superuser.empleados-editarpass', $Empleado->id) }}" method="POST">
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
</div>

    </form>
</div>

@endsection
