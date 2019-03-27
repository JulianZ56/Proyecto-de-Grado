@extends('Layouts-Inicio.inicio-superuser')

@section('contenido')

<div align="center"><img src="https://i.ibb.co/gSxSB8V/Tramited-01.png" width="730" height="150" ></div>
<div align="center" style="color:red"><strong>Adminstrador</strong> </div> 
<p align="center" style="color:blue">{{ auth()->user()->email }}</p> 

<strong align="center" style="color:green">Usted podra realizar las siguientes funciones: </strong> 
<br>
<li class="epa"><strong> Podrá tener el control de todo el sistema administrando cada factor del programa como creación, edición y eliminacion 
de registros si el sistema asi lo permite</li></strong>
<li><strong>Se encarga de crear los empleado y asignar por dependencia a un jefe para llevar el debido proceso de los tramites</li>
<li>Podrá crear otros administradores si asi lo desea</li></strong>
<li><strong>No podrá modificar información de los solicitantes o empleados a menos que ellos lo requieran por peticiones</li>
<li>Los datos creados deben ser valederos, no ingresar informacion ficticia pues para casos 
como el registro de usuario mucha informacion se utiliza </li></strong>
<li class="epa"><strong class="epa">La información se debe completar en su totalidad al crear registros, 
especificamente cuando se creen los catálogos con su documentacion, para llevar el proceso correctamente</li></strong>
<li><strong>Los datos personales de empleados o solicitantes se deben tener reservados, la información no puede ser divulgada</strong></li>


@endsection
