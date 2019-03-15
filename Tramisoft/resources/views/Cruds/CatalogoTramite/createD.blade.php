@extends('Layouts-Inicio.inicio-superuser')
  
@section('contenido')



<script src="/js/Filtros/Filtrado_Dependencia.js">
</script>

<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo">Crear Documentos</h2>
        </th>
        <th style="float: right; border:0;"><a class="btn btn-outline-secondary" href="{{ route('superuser.catalogotramite-index') }}"><i
                    class="fas fa-undo"></i> Volver</a></div>
        </th>
    </tr>
</table>
   
@if ($errors->any())
<div class="alert alert-warning alert-dismissible">
<button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Atención!</strong> Por favor complete el campo.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   


<form action="{{ route('superuser.catalogotramite-validar2', $numero->id ) }}" method="POST">
   
@csrf



 @for ($i = 0; $i < $numero->numeroDocumentos; $i++)


                            <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                            <strong>Nombre Del {{$i+1}} documento:</strong>
                            <input type="text" name="Documento{{$i+1}}" class="form-control" placeholder="Nombre del Catalogo" required>
                            </div>
                            </div>

@endfor

                             


                            

                                     
       

     <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-outline-success" style="float: left;"><i class="fas fa-save"></i> Guardar</button>
        </div>
    
   
</form>



@endsection