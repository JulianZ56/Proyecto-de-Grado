@extends('Layouts-Inicio.inicio-superuser')

@section('contenido')

<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo">Ver Solicitante</h2>
        </th>
        <th style="float: right; border:0;"><a class="btn btn-outline-secondary" href="{{ route('superuser.solicitantes-index') }}"><i
                    class="fas fa-undo"></i> Volver</a></div>
        </th>
    </tr>
</table>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div >
            <div>
                <strong>Identificador Solicitante:</strong>
                <strong class="mostrar">{{ $Solicitante->id }}</strong>
                </div>
                <div>
                <strong>Tipo de Identificacion:</strong>
                <strong class="mostrar"> {{ $Solicitante->tipoidentificacion->nombreIdentificacion }}</strong>              
                </div>
                <div>
                <strong>Ocupacion:</strong>
                <strong class="mostrar"> {{ $Solicitante->ocupacion->nombreOcupacion }}</strong>              
                </div>
                <div>
                <strong>Barrio:</strong>
               <strong class="mostrar">{{ $Solicitante->barrio->nombre }}  -(
                   {{ $Solicitante->barrio->comuna->ciudad->departamento->nacionalidad->nombre }} 
                   - {{ $Solicitante->barrio->comuna->ciudad->departamento->nombreDepartamento }}
                   - {{ $Solicitante->barrio->comuna->ciudad->nombre }}
                   - {{ $Solicitante->barrio->comuna->nombre }})</strong> 
                </div>
                <div>
                <strong>Nombre completo:</strong>
                <strong class="mostrar"> {{ $Solicitante->nombreSolicitante }} {{ $Solicitante->apellido }}</strong>              
                </div>
                <div>
                <strong>Tipo de Persona:</strong>
                <strong class="mostrar"> {{ $Solicitante->tipoPersona }}</strong>              
                </div>
                <div>
                <strong>Cedula:</strong>
                <strong class="mostrar"> {{ $Solicitante->numeroIdentificacion }}</strong>              
                </div>
                <div>
                <strong>Celular:</strong>
                <strong class="mostrar"> {{ $Solicitante->celular }} </strong>              
                </div>
                <div>
                <strong>Teléfono:</strong>
                <strong class="mostrar"> {{ $Solicitante->telefono }} </strong>              
                </div>
                <div>
                <strong>Email:</strong>
                <strong class="mostrar"> {{ $Solicitante->email }} </strong>              
                </div>
                <div>
                <strong>Estarto:</strong>
                <strong class="mostrar"> {{ $Solicitante->estrato }} </strong>              
                </div>
                <div>
                <strong>Vivienda:</strong>
                <strong class="mostrar"> {{ $Solicitante->vivienda }}</strong>              
                </div>
                <div>
                <strong>Genero:</strong>
                <strong class="mostrar"> {{ $Solicitante->genero }}</strong>              
                </div>
                <div>
                <strong>Estado Civil:</strong>
                <strong class="mostrar"> {{ $Solicitante->estadoCivil }}</strong>              
                </div>
                <div>
                <strong>Eps:</strong>
                <strong class="mostrar"> {{ $Solicitante->eps }}</strong>              
                </div>
                <div>
                <strong>Fecha Creacion:</strong>
                <strong class="mostrar"> {{ $Solicitante->created_at->format('Y-M-d') }}</strong> <strong>Hora: {{ $Solicitante->created_at->format('H:i:s') }}</strong>             
                </div>
                <div>
                <strong>Fecha Ultima Actualizacion:</strong>
               <strong class="mostrar">{{ $Solicitante->updated_at->format('Y-M-d') }}</strong> <strong>Hora: {{ $Solicitante->updated_at->format('H:i:s') }}</strong>
                </div>
            </div>
        </div>
    </div>
@endsection