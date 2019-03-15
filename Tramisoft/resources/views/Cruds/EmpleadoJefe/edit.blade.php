@extends('Layouts-Inicio.inicio-superuser')

@section('contenido')

<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo">Editar Empleado Jefe</h2>
        </th>
        <th style="float: right; border:0;"><a class="btn btn-outline-secondary" href="{{ route('superuser.empleadojefe-index') }}"><i
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


<form action="{{ route('superuser.empleadojefe-actualizar', $EmpleadoJefe->idEmpleado) }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <strong class="form-group">Empleado Actual:</strong>
            <strong class="mostrar">{{ $EmpleadoJefe->empleado->nombreEmp }}</strong>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Asignar Nuevo Empleado : </strong>
                <select name="idEmpleado">
                    <option value="{{ $EmpleadoJefe->idEmpleado }}">{{ $EmpleadoJefe->empleado->nombreEmp }}</option>
                    <option disabled="disabled">>------Cambiar Empleado------<</option>
                    @foreach($empleados as $Empleado)
                    <option value="{{ $Empleado->id }}">{{ $Empleado->nombreEmp }}</option>
                    @endforeach
                </select>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-outline-info" style="float: left;"><i class="fas fa-edit"></i> Actualizar</button>
            </div>
        </div>

</form>

@endsection
