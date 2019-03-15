@extends('Layouts-Inicio.inicio-superuser')

@section('contenido')

<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo">Ver Barrio</h2>
        </th>
        <th style="float: right; border:0;"><a class="btn btn-outline-secondary" href="{{ route('superuser.barrio-index') }}"><i
                    class="fas fa-undo"></i> Volver</a></div>
        </th>
    </tr>
</table>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div >
            <div>
                <strong>Identificador Barrio:</strong>
                <strong class="mostrar">{{ $Barrio->id }}</strong>
                </div>
                <div>
                <strong>Nombre Barrio:</strong>
                <strong class="mostrar"> {{ $Barrio->nombre }}</strong>              
                </div>
                <div>
                <strong>Comuna Perteneciente:</strong>
               <strong class="mostrar">{{ $Barrio->comuna->nombre }}</strong> 
                </div>
                <div>
                <strong>Fecha Creacion:</strong>
                <strong class="mostrar"> {{ $Barrio->created_at->format('Y-M-d') }}</strong> <strong>Hora: {{ $Barrio->created_at->format('H:i:s') }}</strong>             
                </div>
                <div>
                <strong>Fecha Ultima Actualizacion:</strong>
               <strong class="mostrar">{{ $Barrio->updated_at->format('Y-M-d') }}</strong> <strong>Hora: {{ $Barrio->updated_at->format('H:i:s') }}</strong>
                </div>
            </div>
        </div>
    </div>
@endsection