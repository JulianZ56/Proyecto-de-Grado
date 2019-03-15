@extends('Layouts-Inicio.inicio-superuser')

@section('contenido')

<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo">Ver Ocupacion</h2>
        </th>
        <th style="float: right; border:0;"><a class="btn btn-outline-secondary" href="{{ route('superuser.ocupacion-index') }}"><i
                    class="fas fa-undo"></i> Volver</a></div>
        </th>
    </tr>
</table>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <div>
                <strong>Nombre Ocupacion:</strong>
                <strong class="mostrar">{{ $Ocupacion->nombreOcupacion }}</strong>
                </div>
                <div>
                <strong>Identificador Ocupacion:</strong>
                <strong class="mostrar">{{ $Ocupacion->id }}</strong>
                </div>
                <div>
                <strong>Fecha Creacion:</strong>
                <strong class="mostrar"> {{ $Ocupacion->created_at->format('Y-M-d') }}</strong> <strong>Hora: {{ $Ocupacion->created_at->format('H:i:s') }}</strong>             
                </div>
                <div>
                <strong>Fecha Ultima Actualizacion:</strong>
               <strong class="mostrar">{{ $Ocupacion->updated_at->format('Y-M-d') }}</strong> <strong>Hora: {{ $Ocupacion->updated_at->format('H:i:s') }}</strong>
                </div>
            </div>
        </div>
    </div>
@endsection