@extends('Layouts-Inicio.inicio-empleado')

@section('contenido')

<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo">Documentacion</h2>
        </th>
        <th style="float: right; border:0;"><a class="btn btn-outline-secondary" href="{{ URL::previous() }}"><i
                    class="fas fa-undo"></i> Volver</a></div>
        </th>
    </tr>
</table>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div>
            <div>


                    @foreach ($Documento as $Documentos)

                <strong class="mostrar">{{ $Documentos->nombrearchivo }}</strong>

                <a href="{{ asset("/storage/$Documentos->nombreDocumento") }}" target="_blank"><button class="btn btn-outline-success"><i class="fas fa-eye"></i> Ver</button></a>

                <a class="btn btn-outline-secondary" href="{{ route('empleado.empleado-ver-descargar', $Documentos->id)}}"><i class="fas fa-download"></i>
                    Descargar</a>

                <br>
                     @endforeach
               
                </div>               
            </div>
        </div>
    </div>
@endsection