@extends('Layouts-Inicio.inicio-empleado')

@section('contenido')

<div align="center"><img src="https://i.ibb.co/gSxSB8V/Tramited-01.png" width="730" height="150" ></div>
<div align="center" style="color:red"><strong>Empleado</strong> </div> 
<p align="center" style="color:blue">{{ auth()->user()->nombreEmp }} {{ auth()->user()->apellidoEmp }}</p> 

<strong align="center" style="color:green">Usted podra realizar las siguientes funciones: </strong> 
<br>
<li class="epa"><strong> Podrá realizarle el seguimiento al tramite</li></strong>
<li><strong>Se encarga de el analisis de los documentos actualizacion de estados y observaciones</li></strong>
<li><strong>Procure resolver los tramites lo mas rapido posible para agilizar los procesos </li></strong>
<li class="epa"><strong class="epa">Podrá realizar comentarios como un medio informal 
para expresarle al solicitante como va su tramite</li></strong>
<li class="epa"><strong class="epa">Para el debido proceso se debe realiza un comentario cuando se actualice un estado o se realiza una observación </li></strong>
<li><strong>Los datos personales del los solicitantes se deben tener reservados, la información no puede ser divulgada</strong></li>


@endsection