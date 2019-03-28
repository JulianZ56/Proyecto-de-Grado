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





<div class="col-xs-6 col-sm-6 col-md-6 text-center">
    <button type="button" data-toggle="collapse" data-target="#demo1" class="btn btn-outline-dark" style="float: left;"><i
            class="fas fa-angle-double-down"></i> Agregar nuevo Documento</button>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div id="demo1" class="btn-group; collapse">
        <form action="{{ route('solicitante.solicitante-NewDoc', $id) }}"  enctype="multipart/form-data" method="POST">
            @csrf
 <br>
           <label>Nombre del Documento</label>

            <input type="text" name="nombrearchivo" class="form-control" placeholder="Nombre" required>
<br>
<div class="form-group">
            <input type="file" name="Documento" required>
        </div>
<br>

           <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-outline-info" style="float: center;"><i class="fas fa-check"></i>
                    Agregar</button>
            </div>

</form>
</div>

    
</div>





      
                     
                    

@endsection