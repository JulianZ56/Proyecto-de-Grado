@extends('Layouts-Inicio.inicio-solicitante')

@section('contenido')

<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo">Documentacion</h2>
        </th>
        <th style="float: right; border:0;"><a class="btn btn-outline-secondary" href="{{ route('solicitante.solicitante-ver', $id)}}"><i
                    class="fas fa-undo"></i> Volver</a></div>
        </th>
    </tr>
</table>
   
    
    <table class="table table-success table-striped" style="border: 2px black border-radius:20px">
    <thead align="center" class="thead-dark">
        <tr>
        <th colspan="4" alignt="center">Documentacion</th>

        </tr>
    </thead>
    <tbody>
         @foreach ($Documento as $Documentos)

        <tr align="center">
            
         <td class="recorte" style="border: 1px green solid; "> <strong class="mostrar"><i class="fas fa-file-image"></i> {{ $Documentos->nombrearchivo }}</strong>
      
            <a href="{{ asset("/storage/$Documentos->nombreDocumento") }}" target="_blank" ><button class="btn btn-outline-success"><i class="fas fa-eye"></i> Ver</button></a>
            <a class="btn btn-outline-info" href="{{ route('solicitante.solicitante-ver-descargar', $Documentos->id)}}"><i class="fas fa-download"></i>
                    Descargar</a>
            </td>
           
        </tr>
            @endforeach
  
</table>

@endsection