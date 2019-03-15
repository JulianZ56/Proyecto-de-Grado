@extends('Layouts-Inicio.inicio-superuser')

@section('contenido')

<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo">Ver Comuna</h2>
        </th>
        <th style="float: right; border:0;"><a class="btn btn-outline-secondary" href="{{ route('superuser.comuna-index') }}"><i
                    class="fas fa-undo"></i> Volver</a></div>
        </th>
    </tr>
</table>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div >
            <div>
                <strong>Identificador Comuna:</strong>
                <strong class="mostrar">{{ $Comuna->id }}</strong>
                </div>
                <div>
                <strong>Nombre Comuna:</strong>
                <strong class="mostrar"> {{ $Comuna->nombre }}</strong>              
                </div>
                <div>
                <strong>Ciudad Perteneciente:</strong>
               <strong class="mostrar">{{ $Comuna->ciudad->nombre }}</strong> 
                </div>
                <div>
                <strong>Fecha Creacion:</strong>
                <strong class="mostrar"> {{ $Comuna->created_at->format('Y-M-d') }}</strong> <strong>Hora: {{ $Comuna->created_at->format('H:i:s') }}</strong>             
                </div>
                <div>
                <strong>Fecha Ultima Actualizacion:</strong>
               <strong class="mostrar">{{ $Comuna->updated_at->format('Y-M-d') }}</strong> <strong>Hora: {{ $Comuna->updated_at->format('H:i:s') }}</strong>
                </div>
            </div>
        </div>
    </div>
@endsection