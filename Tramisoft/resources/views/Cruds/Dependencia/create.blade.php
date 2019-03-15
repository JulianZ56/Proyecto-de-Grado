@extends('Layouts-Inicio.inicio-superuser')
  
@section('contenido')

<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo">Crear Dependencia</h2>
        </th>
        <th style="float: right; border:0;"><a class="btn btn-outline-secondary" href="{{ route('superuser.dependencia-index') }}"><i
                    class="fas fa-undo"></i> Volver</a></div>
        </th>
    </tr>
</table>
   
@if ($errors->any())
<div class="alert alert-warning alert-dismissible">
<button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Atención!</strong> Por favor complete el campo.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('superuser.dependencia-validar') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre</strong>
                <input type="text" name="nombreDependecia" class="form-control" placeholder="Nombre de la Dependencia" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descripcion</strong>
                <textarea type="text" name="descripcionDependencia" class="form-control" placeholder="Breve Explicacion de las funciones de la Dependencia" required></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Perfil</strong>
                <textarea type="text" name="perfilDependencia" class="form-control" placeholder="Perfil de la Dependencia" required></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Mision</strong>
                <textarea type="text" name="mision" class="form-control" placeholder="Objetivos de la Dependencia" required></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Vision</strong>
                <textarea type="text" name="vision" class="form-control" placeholder="Metas a Cumplir de la Dependencia" required></textarea>
            </div>
        </div>

       
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Teléfono</strong>
                <input type="number" name="telefono" class="form-control" placeholder="Numero de Contacto" required>
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-outline-success" style="float: left;"><i class="fas fa-save"></i> Guardar</button>
        </div>
    </div>
   
</form>
@endsection