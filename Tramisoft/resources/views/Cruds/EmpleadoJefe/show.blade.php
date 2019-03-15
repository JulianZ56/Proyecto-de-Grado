@extends('Layouts-Inicio.inicio-superuser')

@section('contenido')

<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo">Ver Empleado Jefe</h2>
        </th>
        <th style="float: right; border:0;"><a class="btn btn-outline-secondary" href="{{ route('superuser.empleadojefe-index') }}"><i
                    class="fas fa-undo"></i> Volver</a></div>
        </th>
    </tr>
</table>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            
            <div>
                <strong>Identificador Empleado jefe:</strong>
                <strong class="mostrar">{{ $EmpleadoJefe->id }}</strong>
                </div>
                <div>
                <strong>Id Empleado:</strong>
                <strong class="mostrar"> {{ $EmpleadoJefe->idEmpleado }}</strong>              
                </div>
                <div>
                <strong>Nombre Completo:</strong>
               <strong class="mostrar">{{ $EmpleadoJefe->empleado->nombreEmp }} {{ $EmpleadoJefe->empleado->apellidoEmp }}</strong> 
                </div>
                <div>
                <strong>Fecha Creacion:</strong>
                <strong class="mostrar"> {{ $EmpleadoJefe->created_at->format('Y-M-d') }}</strong> <strong>Hora: {{ $EmpleadoJefe->created_at->format('H:i:s') }}</strong>             
                </div>
                <div>
                <strong>Fecha Ultima Actualizacion:</strong>
               <strong class="mostrar">{{ $EmpleadoJefe->updated_at->format('Y-M-d') }}</strong> <strong>Hora: {{ $EmpleadoJefe->updated_at->format('H:i:s') }}</strong>
                </div>
            </div>
        </div>
   
@endsection