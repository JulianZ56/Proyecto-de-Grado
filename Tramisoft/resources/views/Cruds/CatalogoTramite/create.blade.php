@extends('Layouts-Inicio.inicio-superuser')
  
@section('contenido')



<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo">Crear Catalogo Tramite</h2>
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
   


<form action="{{ route('superuser.catalogotramite-validar') }}" method="POST">
   
@csrf
<div class="col-xs-8 col-sm-8 col-md-8">
        <div class="card" style="background-color: rgba(144, 241, 144, 0.349); padding: 7px; word-break: break-all; word-wrap: break-word;">
     <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong><i class="fas fa-briefcase"></i> Seleccione Departamento: </strong>  

                <select name="idDependencia" required>
                <option value="">Seleccione Dependencia</option>
                    @foreach($dependencias as $Dependencia)
                    <option  value="{{ $Dependencia->id }}">{{ $Dependencia->nombreDependecia }} </option>
                    @endforeach
                </select>
                
            </div>
        </div> 
</div>
</div>
</div>
<br>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre Catalogo:</strong>
                <input type="text" name="nombreCatalogo" class="form-control" placeholder="Nombre del Catalogo" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Numero Documentos:</strong>
                <input type="text" name="numeroDocumentos" class="form-control" placeholder="Numero Documentos" required>
            </div>
        </div>


          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descripcion</strong>
                <textarea type="text" name="descripcionCatalogo" class="form-control" placeholder="Descripcion Detallada de las funciones del Tramite" required></textarea>
            </div>
        </div>

        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-outline-success" style="float: left;"><i class="fas fa-save"></i> Guardar</button>
        </div>
    
   
</form>
<br>






@endsection