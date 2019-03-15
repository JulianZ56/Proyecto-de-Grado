@extends('Layouts-Inicio.inicio-superuser')

@section('contenido')

<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo">Ver Nacionalidad</h2>
        </th>
        <th style="float: right; border:0;"><a class="btn btn-outline-secondary" href="{{ route('superuser.nacionalidad-index') }}"><i
                    class="fas fa-undo"></i> Volver</a></div>
        </th>
    </tr>
</table>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <div>
                <strong>Nombre Nacionalidad:</strong>
                <strong class="mostrar">{{ $Nacionalidad->nombre }}</strong>
                </div>
                <div>
                <strong>Identificador Nacionalidad:</strong>
                <strong class="mostrar">{{ $Nacionalidad->id }}</strong>
                </div>
                <div>
                <strong>Fecha Creacion:</strong>
                <strong class="mostrar"> {{ $Nacionalidad->created_at->format('Y-M-d') }}</strong> <strong>Hora: {{ $Nacionalidad->created_at->format('H:i:s') }}</strong>             
                </div>
                <div>
                <strong>Fecha Ultima Actualizacion:</strong>
               <strong class="mostrar">{{ $Nacionalidad->updated_at->format('Y-M-d') }}</strong> <strong>Hora: {{ $Nacionalidad->updated_at->format('H:i:s') }}</strong>
                </div>
                
            </div>
        </div>
    </div>
@endsection