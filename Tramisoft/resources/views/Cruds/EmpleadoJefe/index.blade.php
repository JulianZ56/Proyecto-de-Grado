@extends('Layouts-Inicio.inicio-superuser')

@section('contenido')

<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo">Empleado Jefe CRUD</h2>
        </th>
        <th style="float: right; border:0;"><a class="btn btn-outline-success" href="{{ route('superuser.empleadojefe-crear')}}"><i
                    class="fas fa-plus"></i> Crear Empleado</a></div>
        </th>
    </tr>
</table>

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
            <th>Id-Empleado</th>
            <th>Creacion</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($empleadoj as $EmpleadoJefe)

        <tr align="center">
            <td style="border: 1px green solid; ">{{ $EmpleadoJefe->id }}</td>
            <td style="border: 1px green solid;">{{ $EmpleadoJefe->idEmpleado }} -({{ $EmpleadoJefe->empleado->nombreEmp }})</td>
            <td style="border: 1px green solid;">{{ $EmpleadoJefe->created_at->format('Y-M-d') }}</td>
            <td style="border: 1px green solid;">

                <a class="btn btn-outline-secondary" href="{{ route('superuser.empleadojefe-ver', $EmpleadoJefe->id)}}"><i
                        class="fas fa-eye"></i> Ver Empleado</a>
              
                <a class="btn btn-outline-danger" href="{{ route('superuser.empleadojefe-eliminar', $EmpleadoJefe->id)}}"><i
                        class="fas fa-trash-alt"></i> Eliminar</a>




            </td>
        </tr>

        @endforeach

</table>

{!! $empleadoj->links() !!}

@endsection
