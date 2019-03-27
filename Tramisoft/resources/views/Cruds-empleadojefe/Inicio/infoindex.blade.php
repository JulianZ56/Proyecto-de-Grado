@extends('Layouts-Inicio.inicio-empleadojefe')

@section('contenido')

<div align="center"><img src="https://i.ibb.co/gSxSB8V/Tramited-01.png" width="730" height="150" ></div>
<div align="center" style="color:red"><strong>Jefe</strong> </div> 
<p align="center" style="color:blue">{{ auth()->user()->nombreEmp }} {{ auth()->user()->apellidoEmp }}</p> 

<strong align="center" style="color:green">Usted podra realizar las siguientes funciones: </strong> 
<br>
<li class="epa"><strong> Podrá ver todos los tramites que estan por su dependencia</li></strong>
<li><strong>Prodrá asignar o en su defecto re asignar empleados para que le hagan el debido seguimiento a la solicitud</li></strong>
<li><strong>Tendra el control de como va todos los tramites por su dependencia, pudiendo ver comentarios, observaciones y estados actuales </li></strong>
<li><strong>Podrá redireccionar una solicitud en caso de que al ser realizada no 
pertenezca o corresponsa a las funciones de la dependencia, teniendo un mayor control en las solicitudes </li></strong>


@endsection