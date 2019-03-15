@extends('Layouts-Inicio.inicio-empleadojefe')

@section('contenido')

<script src="/js/Filtros/Autocarga.js">
</script>

<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo">Re-Asignar Empleado</h2>
        </th>
        <th style="float: right; border:0;"><a class="btn btn-outline-secondary" href="{{ route('empleadojefe.empleadojefe-index-pendiente')}}"><i
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


<form action="{{ route('empleadojefe.revalidar-empleados', $Tramite->id) }}" method="POST">

    @csrf
    <div class="col-xs-10 col-sm-10 col-md-10">
        <div class="card" style="background-color: rgb(206, 207, 207); padding: 7px; word-break: break-all; word-wrap: break-word;">
            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12">


                    <table class="table table-bordered" style="border: 0; margin:0px">
                        <tr>
                            <th style="border: 0;">
                                <div class="form-group">
                                    <strong><i class="fas fa-bus"></i> Seleccione Empleado : </strong>
                                    <select id="select" name="idEmpleado" required>
                                        <option disabled="disabled">-------------Empleado Actual--------------</option>
                                        <option value="{{ $Empleado->id }}">{{ $Empleado->nombreEmp}}{{ $Empleado->apellidoEmp}}
                                        - ({{ $Empleado->cargoEmp}})
                                        </option>
                                        <option disabled="disabled">--------Seleccione Empleado Nuevo--------</option>
                                        @foreach ($EmpleadosD as $empleadosd)
                                        <option value="{{ $empleadosd->id }}">{{ $empleadosd->nombreEmp}} {{
                                            $empleadosd->apellidoEmp}} -
                                            ({{ $empleadosd->cargoEmp}})
                                        </option>
                                        @endforeach
                                    </select>

                                </div>
                            </th>
                            <th style="float: right; border:0;">


                            </th>
                        </tr>
                    </table>
                </div>


            </div>
        </div>
        <br>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-outline-success" style="float: left;"><i class="fas fa-save"></i>
                Asignar</button>
        </div>
    </div>
    <br>

</form>






@endsection
