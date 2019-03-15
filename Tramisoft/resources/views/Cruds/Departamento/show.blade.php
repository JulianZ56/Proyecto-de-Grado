@extends('Layouts-Inicio.inicio-superuser')

@section('contenido')

<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo">Ver Departamento</h2>
        </th>
        <th style="float: right; border:0;"><a class="btn btn-outline-secondary" href="{{ route('superuser.departamento-index') }}"><i
                    class="fas fa-undo"></i> Volver</a></div>
        </th>
    </tr>
</table>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div >
            <div>
                <strong>Identificador Departamento:</strong>
                <strong class="mostrar">{{ $Departamento->id }}</strong>
                </div>
                <div>
                <strong>Nombre Departamento:</strong>
                <strong class="mostrar"> {{ $Departamento->nombreDepartamento }}</strong>              
                </div>
                <div>
                <strong>Nacionalidad Perteneciente:</strong>
               <strong class="mostrar">{{ $Departamento->nacionalidad->nombre }}</strong> 
                </div>
                <div>
                <strong>Fecha Creacion:</strong>
                <strong class="mostrar"> {{ $Departamento->created_at->format('Y-M-d') }}</strong> <strong>Hora: {{ $Departamento->created_at->format('H:i:s') }}</strong>             
                </div>
                <div>
                <strong>Fecha Ultima Actualizacion:</strong>
               <strong class="mostrar">{{ $Departamento->updated_at->format('Y-M-d') }}</strong> <strong>Hora: {{ $Departamento->updated_at->format('H:i:s') }}</strong>
                </div>
            </div>
        </div>
    </div>
@endsection