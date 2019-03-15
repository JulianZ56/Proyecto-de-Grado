@extends('Layouts-Inicio.inicio-empleado')


@section('contenido')

<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo">Observaciones</h2>
       
    </tr>
</table>


<table class="table table-info table-striped" style="border: 2px black border-radius:20px">
    <thead  align="center" class="thead-dark">
        <tr>
           
            <th>EstadoActual</th>
            <th>Observacion</th>
            <th>Fecha</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($Observa as $Observaciones)

        <tr align="center">
          
            <td class="recorte" style="border: 1px green solid; "> {{ $Observaciones->EstadoActual }}</td>
            <td style="border: 1px green solid;">{{ $Observaciones->Observacion }}</td>
            <td style="border: 1px green solid;">{{ $Observaciones->created_at->format('Y-M-d') }}</td>
           

              

            </td>
        </tr>

        @endforeach

</table>

{!! $Observa->links() !!}
    

@endsection
