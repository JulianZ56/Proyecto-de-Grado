@extends('Layouts-Inicio.inicio-superuser')

@section('contenido')

<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo">Ver Catalogo</h2>
        </th>
        <th style="float: right; border:0;"><a class="btn btn-outline-secondary" href="{{ route('superuser.catalogotramite-index') }}"><i
                    class="fas fa-undo"></i> Volver</a></div>
        </th>
    </tr>
</table>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div >
            <div>
                <strong>Identificador Catalogo:</strong>
                <strong class="mostrar">{{ $Catalogotramites->id }}</strong>
                </div>
                <div>
                <strong>Nombre Catalogo:</strong>
                <strong class="mostrar"> {{ $Catalogotramites->nombreCatalogo }}</strong>              
                </div>

                <div>
                <strong>Dependencia:</strong>
               <strong class="mostrar">{{ $Catalogotramites->dependencia->nombreDependecia }}</strong> 
                </div>
               
                 <div>
                <strong>Cantidad de Documentos Necesarios:</strong>
                <strong class="mostrar"> {{ $Catalogotramites->numeroDocumentos }}</strong>              
                </div>
                 <div>
                <strong>Descripcion:</strong>
                <strong class="mostrar"> {{ $Catalogotramites->descripcionCatalogo }}</strong>              
                </div>
                <div>
                <strong>Fecha Creacion:</strong>
                <strong class="mostrar"> {{ $Catalogotramites->created_at->format('Y-M-d') }}</strong> <strong>Hora: {{ $Catalogotramites->created_at->format('H:i:s') }}</strong>             
                </div>
                <div>
                <strong>Fecha Ultima Actualizacion:</strong>
               <strong class="mostrar">{{ $Catalogotramites->updated_at->format('Y-M-d') }}</strong> <strong>Hora: {{ $Catalogotramites->updated_at->format('H:i:s') }}</strong>
                </div>
            </div>
        </div>
    </div>
@endsection