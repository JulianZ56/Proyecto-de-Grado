@extends('Layouts-Inicio.inicio-superuser')

@section('contenido')

<script src="/js/Filtros/Filtrado_Dependencia.js">
</script>

<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo">Editar Tramite</h2>
        </th>
        <th style="float: right; border:0;"><a class="btn btn-outline-secondary" href="{{ route('superuser.tramites-index') }}"><i
                    class="fas fa-undo"></i> Volver</a></div>
        </th>
    </tr>
</table>


@if ($errors->any())
<div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Atencion!</strong> Por favor complete los campos.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<form action="{{ route('superuser.tramites-actualizar', $Tramite->id) }}" method="POST">
    @csrf


    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descripcion</strong><br>
                <textarea name="descripcionTramite" class="form-control" placeholder="Nombre Catalogo" required>{{ $Tramite->descripcionTramite }}</textarea>
            </div>
        </div>
        
 
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="card" style="background-color: rgba(144, 241, 144, 0.349); padding: 9px; word-break: break-all; word-wrap: break-word;">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <i class="fas fa-question-circle"></i>
                    <strong class="form-group"> INFORMACION ACTUAL:</strong>
                    <button type="button" data-toggle="collapse" data-target="#demo1" class="btn btn-info btn-sm"
                        style="float: right;"><i class="fas fa-angle-double-down"></i> Editar Informacion</button>

                    <hr>
                </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <strong class="form-group"><i class="fas fa-briefcase"></i> Dependencia Actual:</strong>
            <strong class="mostrar">{{ $Tramite->catalogotramite->dependencia->nombreDependecia }}</strong>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <strong class="form-group"><i class="fas fa-briefcase"></i> Tramite Actual:</strong>
            <strong class="mostrar">{{ $Tramite->catalogotramite->nombreCatalogo }}</strong>
        </div>
        @if($encontrado==true)
        <div class="col-xs-12 col-sm-12 col-md-12">
            <strong class="form-group"><i class="fas fa-briefcase"></i> Empleado Actual a cargo:</strong>
            <strong class="mostrar"> Sin Asignar</strong>
        </div>
        @else
        <div class="col-xs-12 col-sm-12 col-md-12">
            <strong class="form-group"><i class="fas fa-briefcase"></i> Empleado Actual a cargo:</strong>
            <strong class="mostrar">{{ $Tramite->empleado->nombreEmp }}</strong>
        </div>
        @endif
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <strong class="form-group"><i class="fas fa-briefcase"></i> Solicita a Actual:</strong>
            <strong class="mostrar">{{ $Tramite->solicitante->nombreSolicitante}} {{ $Tramite->solicitante->apellido}}</strong>
        </div>
</div>
</div>
</div>
<br>
<div id="demo1" class="btn-group; collapse">
    <div class="col-xs-8 col-sm-8 col-md-8">
        <div class="card" style="background-color: rgba(111, 168, 243, 0.349); padding: 9px; word-break: break-all; word-wrap: break-word;">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cambiar Dependencia : </strong>
                <select id="Dependencia" name="idDependencia" required>
                <option value="{{ $Tramite->catalogotramite->dependencia->id }}">{{ $Tramite->catalogotramite->dependencia->nombreDependecia }}</option>
                    <option disabled="disabled">>------Cambiar Dependencia------<</option>
                    @foreach($dependencias as $Dependencia)
                    <option value="{{ $Dependencia->id }}">{{ $Dependencia->nombreDependecia }} </option>
                    @endforeach
                </select>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            
            <div class="form-group">
                <strong>Cambiar Tramite : </strong>
                <select id="Catalogo" name="idCatalogoTramite" disabled="disabled" required>
                <option value="{{ $Tramite->catalogotramite->id }}">{{ $Tramite->catalogotramite->nombreCatalogo }}</option>
                </select>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            @if($encontrado==true)
            <div class="form-group">
                <strong>Cambiar Empleado : </strong>
                <select id="Empleado" name="idEmpleado" disabled="disabled" required>
                <option value="null">Sin Asignar</option>
               
                </select>
            </div>
            @else
            <div class="form-group">
                <strong>Cambiar Empleado : </strong>
                <select id="Empleado" name="idEmpleado" disabled="disabled" required>
                <option value="{{ $Tramite->empleado->id }}">{{ $Tramite->empleado->nombreEmp }}</option>
                </select>
            </div>
            @endif
            
</div>
</div>
</div>
</div>
</div>
            
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-outline-info" style="float: right;"><i class="fas fa-edit"></i> Actualizar</button>
            </div>

</form>

@endsection
