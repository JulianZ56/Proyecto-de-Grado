@extends('Layouts-Inicio.inicio-superuser')

@section('contenido')

<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo">Ocupacion CRUD</h2>
        </th>
        <th style="float: right; border:0;"><a class="btn btn-outline-success" href="{{ route('superuser.ocupacion-crear') }}"><i
                    class="fas fa-plus"></i> Crear Ocupacion</a></div>
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

<table class="table table-info table-striped"  style="border: 2px black border-radius:20px">
    <thead align="center" class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Nombre Ocupacion</th>
            <th>Creacion</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ocupaciones as $Ocupacion)
        <tr align="center" >
            <td style="border: 1px green solid;">{{ $Ocupacion->id }}</td>
            <td class="recorte" style="border: 1px green solid;">
               {{ $Ocupacion->nombreOcupacion }}
            </td>
            <td style="border: 1px green solid;">{{ $Ocupacion->created_at->format('Y-M-d') }}</td>
            <td style="border: 1px green solid;">

                <a class="btn btn-outline-secondary" href="{{ route('superuser.ocupacion-ver', $Ocupacion->id)}}"><i class="fas fa-eye"></i> Ver</a>
                    <a class="btn btn-outline-info" href="{{ route('superuser.ocupacion-editar', $Ocupacion->id) }}"><i
                            class="fas fa-pencil-alt"></i> Editar</a>
                    <a class="btn btn-outline-danger" href="{{ route('superuser.ocupacion-eliminar', $Ocupacion->id) }}"><i
                            class="fas fa-trash-alt"></i> Eliminar</a>
                    



            </td>
        </tr>

        @endforeach

</table>


{!! $ocupaciones->links() !!}

@endsection
