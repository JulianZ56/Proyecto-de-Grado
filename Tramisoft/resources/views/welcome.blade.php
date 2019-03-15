<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
   
        <title>Proyecto Tramisoft</title>  

<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/litera/bootstrap.min.css">
<link rel="icon" href="{{ asset('/img/logotipo.png') }}">    

    </head>

<div class="header">
    <body>

<style type="text/css">
   .header{ 
    width: 100%;
    height: 100%;
    background:url('img/sijeñor.jpg') no-repeat center center fixed;
    background-size: cover;
    position: absolute;
   }

</style>
 
<div class="container" style="margin-top:120px"> 
    <div >
    <center> 
        <br>
        <br>
   <img src="img/Tramited-01.png" width="100%"> 
  
   <br>
   <br>
   <p>Desde esta pagina solo registrandote puede realizar tus tramites</p> 
   <p>de una manera facil y divertida atraves de internet</p> 
   <br>
  
    
    <a class="btn btn-success" href="{{route('Registro-Usuario')}}">
            <i class="fas fa-undo"></i> Regístrate</a>
    <a class="btn btn-info" href="{{route('inicio-usuario')}}">
            <i class="fas fa-undo" ></i> Ingresar</a>
            
            </div>
</center> 

    </div>   

    
</div>
<br>

    </body>
    </div>
</html>
