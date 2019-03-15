@extends('Layouts-Inicio.inicio-superuser')

@section('contenido')

<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo">Ver Ciudad</h2>
        </th>
        <th style="float: right; border:0;"><a class="btn btn-outline-secondary" href="{{ route('superuser.ciudad-index') }}"><i
                    class="fas fa-undo"></i> Volver</a></div>
        </th>
    </tr>
</table>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            
            <div>
                <strong>Identificador Ciudad:</strong>
                <strong class="mostrar">{{ $Ciudad->id }}</strong>
                </div>
                <div>
                <strong>Nombre Ciudad:</strong>
                <strong class="mostrar"> {{ $Ciudad->nombre }}</strong>              
                </div>
                <div>
                <strong>Departamento Perteneciente:</strong>
               <strong class="mostrar">{{ $Ciudad->departamento->nombreDepartamento }}</strong> 
                </div>
                <div>
                <strong>Fecha Creacion:</strong>
                <strong class="mostrar"> {{ $Ciudad->created_at->format('Y-M-d') }}</strong> <strong>Hora: {{ $Ciudad->created_at->format('H:i:s') }}</strong>             
                </div>
                <div>
                <strong>Fecha Ultima Actualizacion:</strong>
               <strong class="mostrar">{{ $Ciudad->updated_at->format('Y-M-d') }}</strong> <strong>Hora: {{ $Ciudad->updated_at->format('H:i:s') }}</strong>
                </div>
            </div>
        </div>
   
@endsection