@extends('Layouts-Inicio.inicio-empleadojefe')

@section('contenido')

<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo">Ver Documentos</h2>
        </th>
        <th style="float: right; border:0;"><a class="btn btn-outline-secondary" href=""><i
                    class="fas fa-undo"></i> Volver</a></div>
        </th>
    </tr>
</table>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div>
            <div>


                    @foreach ($Documento as $Documentos)

                <strong>Nombre Documento:</strong>
                <strong class="mostrar">{{ $Documentos->nombrearchivo }}</strong>

                <a href="{{ asset("/storage/$Documentos->nombreDocumento") }}" target="_blank"><button>ver</button></a>

                <a class="btn btn-outline-secondary" href="{{ route('empleadojefe.empleadojefe-ver-descargar', $Documentos->id)}}"><i class="fas fa-eye"></i>
                    Descargar</a>

                <br>
                     @endforeach
               
                </div>               
            </div>
        </div>
    </div>
@endsection