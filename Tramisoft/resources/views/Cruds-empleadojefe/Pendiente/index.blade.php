@extends('Layouts-Inicio.inicio-empleadojefe')

@section('contenido')

<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo2" align="center" >Tramites Sin Asignar</h2>
        </th>
    </tr>
</table>

@if ($message = Session::get('advertencia'))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong style="padding-right:60px"><i class="fas fa-exclamation-triangle"></i> Atencion..! No puedes Eliminar este
        Registro</strong> <button class="btn btn-danger"><a href="#openModal"><i class="fas fa-info-circle"></i>
            Informacion</a></button>
</div>
<div id="openModal" class="modalDialog">
    <div>
        <a href="#close" title="Close" class="closed">X</a>
        <br>
        <h2>ADVERTENCIA!</h2>
        <hr>
        <p>{{ $message }}</p>
    </div>
</div>
@endif

@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Exito!</strong> {{ $message }}
</div>
@endif

@if ($message = Session::get('info'))
<div class="alert alert-primary alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Exito!</strong> {{ $message }}
</div>
@endif

@if ($message = Session::get('danger'))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Exito!</strong> {{ $message }}
</div>
@endif

         @foreach ($TramitesD as $Tramite)

  <div class="card " style=" border: black 1px solid;">


  <div class="card-footer text-muted" style="background-color:rgb(34, 66, 59);">

<div class="row">
  <div class="column">
      <p style="color:white;">Nombre del tramite:&nbsp;<strong>{{ $Tramite->nombreCatalogo }}</strong></p>
    <p> </p>
  </div>
  <div class="column" >
   <p style="text-align: right;" ><a class="btn btn-outline-secondary"   href="{{ route('empleadojefe.ReasignarDependencia', $Tramite->id)}}"><i class="fas fa-eye"></i>Reasignar Dependencia</a> </p>
  </div>
</div> 
   
  </div>


  <div class="card-body" style="background-color:rgb(236, 236, 236);">
    <p >Nombre del Solicitante:&nbsp;<strong>{{ $Tramite->nombreSolicitante }} {{ $Tramite->apellido }}</strong></p>
    <p>Numero del ID:&nbsp;{{ $Tramite->id }} </p>

    <p class="card-title">Descripcion:&nbsp;{{ $Tramite->descripcionTramite }}</p>              
  </div>

  <div class="card-footer text-muted" style="background-color:rgb(34, 66, 59);">

<div class="row">
  <div class="column">
  <p style="color:white;"> {{ Carbon\Carbon::parse($Tramite->created_at)->format('M-d-Y') }} -<strong class="mostrar" style="color:cyan;">Hora :</strong>{{ Carbon\Carbon::parse($Tramite->created_at)->format('H:i:s') }}</p>
  </div>
  <div class="column" >
   <p style="text-align: right;" ><a class="btn btn-outline-secondary"   href="{{ route('empleadojefe.empleadojefe-ver-Pendiente', $Tramite->id)}} "><i class="fas fa-eye"></i> Atender tramite</a> </p>
  </div>
</div>
     
   
  </div>
</div>
<br>
   
        @endforeach

{{ $TramitesD->links() }}



@endsection
