@extends('Layouts-Inicio.inicio-solicitante')

@section('contenido')

<div align="center"><img src="https://i.ibb.co/gSxSB8V/Tramited-01.png" width="730" height="150" ></div>
<div align="center" style="color:red"><strong>Solicitante</strong> </div> 
<p align="center" style="color:blue">{{ auth()->user()->nombreSolicitante }} {{ auth()->user()->apellido }}</p> 

<strong align="center" style="color:green">Usted podra realizar las siguientes funciones: </strong> 
<br>
<li class="epa"><strong> Podrá crear una solicitud (Tramite) de acuerdo a su inquietud</li></strong>
<li><strong>Tendra en la creacion del tramite que adjuntar todos los documentos necesarios para llevar el debido proceso </li></strong>
<li class="epa"><strong class="epa">Podrá realizar comentarios como un medio informal 
para expresarle al empleado como va su tramite</li></strong>
<li class="epa"><strong class="epa">Podrá expresarle inquietudes por medio de los comentarios o incertidumbres que surjan durante el proceso </li></strong>
<li><strong>Los datos personales se tendran reservados, su información no será divulgada</strong></li>



@endsection