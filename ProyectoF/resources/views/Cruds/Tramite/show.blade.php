@extends('Layouts-Inicio.inicio-superuser')

@section('contenido')

<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo">Ver Tramite</h2>
        </th>
        <th style="float: right; border:0;"><a class="btn btn-outline-secondary" href="{{ route('superuser.tramites-index') }}"><i
                    class="fas fa-undo"></i> Volver</a></div>
        </th>
    </tr>
</table>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div >
            <div>
                <strong>Identificador Tramite:</strong>
                <strong class="mostrar">{{ $Tramite->id }}</strong>
                </div>
                <div>
                <strong>Nombre Solicitante:</strong>
                <strong class="mostrar"> {{ $Tramite->solicitante->nombreSolicitante }} {{ $Tramite->solicitante->apellido }}</strong>              
                </div>
                <div>
                <strong>Tramite:</strong>
               <strong class="mostrar">{{ $Tramite->catalogotramite->nombreCatalogo }}</strong> 
                </div>
               @if($encontrado==true)
               <div>
                <strong>Empleado Asignado:</strong>
                <strong class="mostrar"> ------------(Sin Asignar)-----------</strong>              
                </div>
               @else
               <div>
                <strong>Empleado Asignado:</strong>
                <strong class="mostrar"> {{ $Tramite->empleado->nombreEmp }} {{ $Tramite->empleado->apellidoEmp }}</strong>              
                </div>
               @endif
                 <div>
                <strong>Descripcion:</strong>
                <strong class="mostrar"> {{ $Tramite->descripcionTramite }}</strong>              
                </div>
                <div>
                <strong>Fecha Creacion:</strong>
                <strong class="mostrar"> {{ $Tramite->created_at->format('Y-M-d') }}</strong> <strong>Hora: {{ $Tramite->created_at->format('H:i:s') }}</strong>             
                </div>
                <div>
                <strong>Fecha Ultima Actualizacion:</strong>
               <strong class="mostrar">{{ $Tramite->updated_at->format('Y-M-d') }}</strong> <strong>Hora: {{ $Tramite->updated_at->format('H:i:s') }}</strong>
                </div>
            </div>
        </div>
    </div>
@endsection