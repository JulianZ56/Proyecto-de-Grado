@extends('Layouts-Inicio.inicio-superuser')

@section('contenido')

<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo">Ver Empleado</h2>
        </th>
        <th style="float: right; border:0;"><a class="btn btn-outline-secondary" href="{{ route('superuser.empleados-index') }}"><i
                    class="fas fa-undo"></i> Volver</a></div>
        </th>
    </tr>
</table>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div >
            <div>
                <strong>Identificador Empleado:</strong>
                <strong class="mostrar">{{ $Empleado->id }}</strong>
                </div>
                <div>
                <strong>Dependencia:</strong>
                <strong class="mostrar"> {{ $Empleado->dependencias->nombreDependecia }}</strong>              
                </div>
                <div>
                <strong>Nombre:</strong>
                <strong class="mostrar"> {{ $Empleado->nombreEmp }}</strong>              
                </div>

                <div>
                <strong>Apellido:</strong>
               <strong class="mostrar">{{ $Empleado->apellidoEmp }}</strong> 
                </div>
               
                 <div>
                <strong>N° Identificacion:</strong>
                <strong class="mostrar"> {{ $Empleado->identificacion }}</strong>              
                </div>
                 <div>
                <strong>Cargo Empleado:</strong>
                <strong class="mostrar"> {{ $Empleado->cargoEmp }}</strong>              
                </div>
                <div>
                <strong>Email:</strong>
                <strong class="mostrar"> {{ $Empleado->email }}</strong>              
                </div>
                <div>
                <strong>Contraseña:</strong>
                <strong class="mostrar"> {{ $Empleado->password }}</strong>              
                </div>
                <div>
                <strong>Fecha Creacion:</strong>
                <strong class="mostrar"> {{ $Empleado->created_at->format('Y-M-d') }}</strong> <strong>Hora: {{ $Empleado->created_at->format('H:i:s') }}</strong>             
                </div>
                <div>
                <strong>Fecha Ultima Actualizacion:</strong>
               <strong class="mostrar">{{ $Empleado->updated_at->format('Y-M-d') }}</strong> <strong>Hora: {{ $Empleado->updated_at->format('H:i:s') }}</strong>
                </div>
            </div>
        </div>
    </div>
@endsection