@extends('Layouts-Inicio.inicio-superuser')

@section('contenido')

<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo">Editar Administrador</h2>
        </th>
        <th style="float: right; border:0;"><a class="btn btn-outline-secondary" href="{{ route('superuser.admin-index') }}"><i
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

@if ($message = Session::get('danger'))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Error!</strong> {{ $message }}
</div>
@endif


<form action="{{ route('superuser.admin-actualizar', $SuperUser->id) }}" method="POST">
    @csrf


    <div class="row">
        

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="email" value="{{ $SuperUser->email }}" class="form-control" placeholder="E-mail Admin">
            </div>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-5 text-center">
            <button type="submit" class="btn btn-outline-info" style="float: center;"><i class="fas fa-check"></i>
                Actualizar Email</button>

            <br><br>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">



            </div>
        </div>
</form>

<div class="col-xs-6 col-sm-6 col-md-6 text-center">
    <button type="button" data-toggle="collapse" data-target="#demo1" class="btn btn-outline-dark" style="float: left;"><i
            class="fas fa-angle-double-down"></i> Editar Password</button>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div id="demo1" class="btn-group; collapse">
        <form action="{{ route('superuser.admin-editarpass', $SuperUser->id) }}" method="POST">
            @csrf
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Password:</strong>
                    <input type="password" name="password" class="form-control" placeholder="Contraseña">
                </div>
            </div>
            <br>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-outline-info" style="float: center;"><i class="fas fa-check"></i>
                    Actualizar Password</button>
            </div>

    </div>


    </form>
</div>

@endsection
