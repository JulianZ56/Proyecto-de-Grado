@extends('Layouts-Inicio.inicio-solicitante')

@section('contenido')



<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo">Gestiona tus Tramites</h2>
        </th>
        <th style="float: right; border:0;"><a class="btn btn-outline-secondary" href=""><i
                    class="fas fa-undo"></i> Volver</a></div>
        </th>
    </tr>
</table>



  
      <h3>Complete la Información</h3>
  
<form  action="{{route('solicitante.Sol-Documento', ['id' => $variable->id])}}" method="post" enctype="multipart/form-data">
        

 @csrf

@for ($i =0 ; $i < $num; $i++)
    

    <div class="form-group">
                         <label>{{ $Documento[$i]->nombreDoc}}</label>
                   </div>

    <div class="form-group">
                 <input type="file" name="Documento{{$i}}">
                   </div>

@endfor






        <button class="btn btn-info" type="submit">Enviar</button>
</form>







@endsection
