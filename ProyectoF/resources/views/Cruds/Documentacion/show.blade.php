@extends('Layouts-Inicio.inicio-superuser')

@section('contenido')

<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo">Ver Dependencia</h2>
        </th>
        <th style="float: right; border:0;"><a class="btn btn-outline-secondary" href="{{ route('superuser.dependencia-index') }}"><i
                    class="fas fa-undo"></i> Volver</a></div>
        </th>
    </tr>
</table>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <div>
                <strong>Nombre Dependencia:</strong>
                <strong class="mostrar">{{ $Dependencia->nombreDependecia }}</strong>
                </div>
                <div>
                <strong>Descripción:</strong>
                <strong class="mostrar">{{ $Dependencia->descripcionDependencia }}</strong>
                </div>
                <div>
                <strong>Perfil:</strong>
                <strong class="mostrar">{{ $Dependencia->perfilDependencia }}</strong>
                </div>
                <div>
                <strong>Misión:</strong>
                <strong class="mostrar">{{ $Dependencia->mision }}</strong>
                </div>
                <div>
                <strong>Visión:</strong>
                <strong class="mostrar">{{ $Dependencia->vision }}</strong>
                </div>
                <div>
                <strong>Teléfono:</strong>
                <strong class="mostrar">{{ $Dependencia->telefono }}</strong>
                </div>
                <div>
                <strong>Fecha Creacion:</strong>
                <strong class="mostrar"> {{ $Dependencia->created_at->format('Y-M-d') }}</strong> <strong>Hora: {{ $Dependencia->created_at->format('H:i:s') }}</strong>             
                </div>
                <div>
                <strong>Fecha Ultima Actualizacion:</strong>
               <strong class="mostrar">{{ $Dependencia->updated_at->format('Y-M-d') }}</strong> <strong>Hora: {{ $Dependencia->updated_at->format('H:i:s') }}</strong>
                </div>
            </div>
        </div>
    </div>
@endsection