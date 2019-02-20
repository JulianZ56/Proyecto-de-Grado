@extends('Layouts-Inicio.inicio-superuser')

@section('contenido')

<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo">Administradores CRUD</h2>
        </th>
        <th style="float: right; border:0;"><a class="btn btn-outline-success" href="{{ route('superuser.admin-crear')}}"><i
                    class="fas fa-plus"></i> Crear Administrador</a></div>
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
            <th>Email</th>
            <th>Password</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
        @foreach($superusers as $SuperUser)

        <tr align="center">
            <td style="border: 1px green solid; ">{{ $SuperUser->id }}</td>
            <td style="border: 1px green solid; ">{{ $SuperUser->email }}</td>
            <td style="border: 1px green solid;">{{ $SuperUser->password }}</td>
            <td style="border: 1px green solid;">

               
                <a class="btn btn-outline-info" href="{{ route('superuser.admin-editar', $SuperUser->id)}}"><i class="fas fa-pencil-alt"></i> Editar</a>
                <a class="btn btn-outline-danger" href="{{ route('superuser.admin-eliminar', $SuperUser->id)}}"><i
                        class="fas fa-trash-alt"></i> Eliminar</a>

            </td>
        </tr>

        @endforeach

</table>

{!! $superusers->links() !!}

@endsection
