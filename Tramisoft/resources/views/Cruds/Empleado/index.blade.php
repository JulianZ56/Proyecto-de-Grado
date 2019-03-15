@extends('Layouts-Inicio.inicio-superuser')

@section('contenido')

<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo">Empleados CRUD</h2>
        </th>
        <th style="float: right; border:0;"><a class="btn btn-outline-success" href="{{ route('superuser.empleados-crear')}}"><i
                    class="fas fa-plus"></i> Crear Empleado</a></div>
        </th>
    </tr>
</table>

@if ($message = Session::get('advertencia'))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong style="padding-right:60px"><i class="fas fa-exclamation-triangle"></i> Atencion..! No puedes Eliminar este
        Registro</strong> <button class="btn btn-danger"><a href="#openModal"><i class="fas fa-info-circle"></i>
            Informacion</a></button>
</div>
<div id="openModal" class="modalDialog">
    <div>
        <a href="#close" title="Close" class="closed">X</a>
        <br>
        <h2>ADVERTENCIA!</h2>
        <hr>
        <p>{{ $message }}</p>
    </div>
</div>
@endif

@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Exito!</strong> {{ $message }}
</div>
@endif

@if ($message = Session::get('info'))
<div class="alert alert-primary alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Exito!</strong> {{ $message }}
</div>
@endif

@if ($message = Session::get('danger'))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Exito!</strong> {{ $message }}
</div>
@endif

<table class="table table-info table-striped" style="border: 2px black border-radius:20px">
    <thead align="center" class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Id-Dependencia</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Identificacion</th>
            <th>Email</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($empleados as $Empleado)

        <tr align="center">
            <td style="border: 1px green solid; ">{{ $Empleado->id }}</td>
            <td class="recorte" style="border: 1px green solid; "> {{ $Empleado->idDependencia }} -({{ $Empleado->dependencias->nombreDependecia }})</td>
            <td style="border: 1px green solid;" >{{ $Empleado->nombreEmp }}</td>
            <td style="border: 1px green solid;">{{ $Empleado->apellidoEmp }}</td>
            <td style="border: 1px green solid;" >{{ $Empleado->identificacion }}</td>
            <td style="border: 1px green solid;">{{ $Empleado->email }}</td>
            <td style="border: 1px green solid;">

                <a class="btn btn-outline-secondary" href="{{ route('superuser.empleados-ver', $Empleado->id)}}"><i
                        class="fas fa-eye"></i> Ver</a>
                <a class="btn btn-outline-info" href="{{ route('superuser.empleados-editar', $Empleado->id)}}"><i class="fas fa-pencil-alt"></i> Editar</a>
                <a class="btn btn-outline-danger" href="{{ route('superuser.empleados-eliminar', $Empleado->id)}}"><i
                        class="fas fa-trash-alt"></i> Eliminar</a>




            </td>
        </tr>

        @endforeach

</table>

{!! $empleados->links() !!}

@endsection
