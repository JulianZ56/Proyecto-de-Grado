@extends('Layouts-Inicio.inicio-empleado')

@section('contenido')

<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo">Estado del tramite</h2>
       
    </tr>
</table>


<table class="table table-light table-striped">
    <tbody>
        <tr>
            <td class="columnas2" style="border: gray 1px solid;"><strong>Estado del tramite</strong></td>
            <td class="bordes2">
                <form action="{{ route('empleado.empleado-actualizar', $Tramite->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <select name="validacionEtapa" required>
                                <option value="{{ $Segui }}">{{$Segui}}</option>
                                <option disabled="disabled">>------Cambiar Estado------<</option> 
                                <option>Revicion</option>
                                <option>Proceso</option>
                                <option>Finalizado</option>
                                <option>Rechazado</option>
                            </select>
            </td>
        </tr>
        <tr>
            <td class="columnas" style="border: gray 1px solid;"><strong>Odservacion</strong></td>
            <td class="bordes2"><textarea rows="3" cols="50" type="tex" name="Observacion" class="form-control"
                    placeholder="New Observacion" required></textarea></td>
        </tr>
        </div>
    </tbody>
</table>

        <div class="col-3">
            <button type="submit" class="btn btn-outline-info btn-sm" style="float: center;">
                <i class="fas fa-edit"></i>Actualizar</button></div>
        </div>
</form>


@endsection
