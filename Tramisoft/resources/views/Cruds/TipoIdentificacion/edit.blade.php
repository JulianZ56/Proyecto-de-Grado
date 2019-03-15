@extends('Layouts-Inicio.inicio-superuser')

@section('contenido')

<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo">Editar Tipo Identificacion</h2>
        </th>
        <th style="float: right; border:0;"><a class="btn btn-outline-secondary" href="{{ route('superuser.tipoidentificacion-index') }}"><i
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


<form action="{{ route('superuser.tipoidentificacion-actualizar', $TipoIdentificacion->id) }}" method="POST">
    @csrf


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre</strong><br>
                <input type="text" name="nombreIdentificacion" value="{{ $TipoIdentificacion->nombreIdentificacion }}" class="form-control" placeholder="Nombre tipo identificacion" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-outline-info" style="float: left;"><i class="fas fa-edit"></i> Actualizar</button>
        </div>
    </div>

</form>

@endsection
