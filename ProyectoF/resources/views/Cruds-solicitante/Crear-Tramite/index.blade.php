@extends('Layouts-Inicio.inicio-solicitante')

@section('contenido')

<script src="/js/Filtros/Filtrado_Dependencia.js">
</script>

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

@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Exito!</strong> {{ $message }}
</div>
@endif

  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home">Informacion</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1">Realizar Tramites</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="tab-pane active"><br>
      <h3> Cordial saludo..! {{ auth()->user()->nombreSolicitante }} {{ auth()->user()->apellido }}</h3>
      <p>En esta seccion podra realizar sus solicitudes para darle seguimiento a su tramite, recuerde 
      completar todos los campos y adjuntar la informacion requerida para darte un optimo manejo a su informacion 
      y gestionar mas rapido su solicitud</p>
    </div>
    <div id="menu1" class="tab-pane fade"><br>
      <h3>Complete la Información</h3>
      <form action="{{ route('solicitante.creartramite-validar') }}" method="POST">

    @csrf
    <div class="col-xs-8 col-sm-8 col-md-8">
        <div class="card" style="background-color: rgba(244, 541, 144, 0.349); padding: 7px; word-break: break-all; word-wrap: break-word;">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong><i class="fas fa-user"></i>Solicitante: </strong>
                     <a name="idSolicitante" value="{{ auth()->user()->id }}" required>{{ auth()->user()->nombreSolicitante }}  {{ auth()->user()->apellido }}</a>

                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong><i class="fas fa-briefcase"></i> Seleccione Dependencia: </strong>
                        <select id="Dependencia" required>
                        <option value="">-----Seleccione Dependencia-----</option>
                            @foreach($dependencias as $Dependencia)
                            <option value="{{ $Dependencia->id }}">{{ $Dependencia->nombreDependecia }}</option>
                            @endforeach
                        </select>


                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong><i class="fas fa-clipboard-list"></i> Seleccione el Tramite a Realizar: </strong>
                        <select id="Catalogo" name="idCatalogoTramite" disabled="disabled" required>
                        </select>

                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <br>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Descripcion:</strong>
            <textarea type="text" name="descripcion" class="form-control" placeholder="Descripcion detallada" required></textarea>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-outline-success" style="float: left;"><i class="fas fa-save"></i> Guardar</button>
    </div>


</form>
    
  </div>




@endsection
