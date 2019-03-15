@extends('Layouts-Inicio.inicio-superuser')

@section('contenido')

<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo">Crear Departamento</h2>
        </th>
        <th style="float: right; border:0;"><a class="btn btn-outline-secondary" href="{{ route('superuser.departamento-index') }}"><i
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



<form action="{{ route('superuser.departamento-validar') }}" method="POST">

    @csrf
    <div class="col-xs-8 col-sm-8 col-md-8">
        <div class="card" style="background-color: rgba(144, 241, 144, 0.349); padding: 7px; word-break: break-all; word-wrap: break-word;">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong><i class="fa fa-plane"></i> Seleccione Nacionalidad : </strong>

                        <select name="idNacionalidad" required>
                            <option value="">-----Seleccione Nacionalidad-----</option>
                            @foreach($nacionalidades as $Nacionalidad)
                            <option value="{{ $Nacionalidad->id }}">{{ $Nacionalidad->nombre }} </option>
                            @endforeach
                        </select>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nombre</strong>
            <input type="text" name="nombreDepartamento" class="form-control" placeholder="Nombre Departamento" required>
        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-outline-success" style="float: left;"><i class="fas fa-save"></i>
            Guardar</button>
    </div>


</form>
@endsection
