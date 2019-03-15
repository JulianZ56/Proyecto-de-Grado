@extends('Layouts-Inicio.inicio-superuser')

@section('contenido')

<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo">Editar Dependencia</h2>
        </th>
        <th style="float: right; border:0;"><a class="btn btn-outline-secondary" href="{{ route('superuser.dependencia-index') }}"><i
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


<form action="{{ route('superuser.dependencia-actualizar', $Dependencia->id) }}" method="POST">
    @csrf


    <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre</strong>
                <input type="text" name="nombreDependecia" value="{{ $Dependencia->nombreDependecia }}" class="form-control" placeholder="Nombre Dependencia" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descripcion</strong>
                <textarea type="textarea" name="descripcionDependencia" class="form-control" placeholder="Nombre Dependencia" required>{{ $Dependencia->descripcionDependencia }}</textarea>
                
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Perfil</strong>
                <textarea type="text" name="perfilDependencia" class="form-control" placeholder="Nombre Dependencia" required>{{ $Dependencia->perfilDependencia }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Mision</strong>
                <textarea type="text" name="mision"  class="form-control" placeholder="Nombre Dependencia" required>{{ $Dependencia->mision }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Vision</strong>
                <textarea type="text" name="vision" class="form-control" placeholder="Nombre Dependencia" required>{{ $Dependencia->vision }}</textarea>
            </div>
        </div> 
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Telefono</strong>
                <input type="text" name="telefono" value="{{ $Dependencia->telefono }}" class="form-control" placeholder="Nombre Dependencia" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-outline-info" style="float: left;"><i class="fas fa-edit"></i> Actualizar</button>
        </div>
    </div>

</form>

@endsection
