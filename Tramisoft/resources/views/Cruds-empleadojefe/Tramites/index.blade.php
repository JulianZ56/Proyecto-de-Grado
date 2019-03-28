@extends('Layouts-Inicio.inicio-empleadojefe')

@section('contenido')

<script src="/js/Filtros/Filtrado_Dependencia.js">
</script>



<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo">Reasignar Dependencia</h2>
        </th>

        <th style="float: right; border:0;"><a class="btn btn-outline-secondary" href="{{ URL::previous() }}"><i
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

  <br>

<form action="{{ route('empleadojefe.validar-dependencia', $id) }}" method="POST">

    @csrf

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
    <br>



    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-outline-success" style="float: left;"><i class="fas fa-save"></i> Guardar</button>
    </div>


</form>



@endsection
