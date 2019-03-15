@extends('Layouts-Inicio.inicio-superuser')

@section('contenido')

<script src="/js/Filtros/Filtrado_Dependencia.js">
</script>

<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo">Crear Tramite</h2>
        </th>
        <th style="float: right; border:0;"><a class="btn btn-outline-secondary" href="{{ route('superuser.tramites-index') }}"><i
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



<form action="{{ route('superuser.tramites-validar') }}" method="POST">

    @csrf
    <div class="col-xs-8 col-sm-8 col-md-8">
        <div class="card" style="background-color: rgba(244, 541, 144, 0.349); padding: 7px; word-break: break-all; word-wrap: break-word;">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong><i class="fas fa-user"></i> Seleccione Solicitante: </strong>

                        <select name="idSolicitante" required>
                            <option value="">-----Seleccione Solicitante-----</option>
                            @foreach($solicitantes as $Solicitante)
                            <option value="{{ $Solicitante->id }}">{{ $Solicitante->nombreSolicitante }} {{ $Solicitante->apellido
                                }} </option>
                            @endforeach
                        </select>

                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong><i class="fas fa-briefcase"></i> Seleccione Dependencia: </strong>

                        <select id="Dependencia" name="idDependencia" required>
                            <option value="">-----Seleccione Dependencia-----</option>
                            @foreach($dependencias as $Dependencia)
                            <option value="{{ $Dependencia->id }}">{{ $Dependencia->nombreDependecia }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong><i class="fas fa-clipboard-list"></i> Seleccione el Tramite a Realizar: </strong>
                        <select id="Catalogo" name="idCatalogoTramite" disabled="disabled" required>
                        </select>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Descripcion:</strong>
            <input type="text" name="descripcionTramite" class="form-control" placeholder="Descripcion detallada" required>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-outline-success" style="float: left;"><i class="fas fa-save"></i> Guardar</button>
    </div>


</form>
@endsection
