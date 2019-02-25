@extends('Layouts-Inicio.inicio-solicitante')

@section('contenido')



<table class="table table-bordered" style="border: 0; margin:0px">
    <tr>
        <th style="border: 0;">
            <h2 class="titulo">Gestiona tus Tramites</h2>
        </th>
        <th style="float: right; border:0;"><a class="btn btn-outline-secondary" href=""><i
                    class="fas fa-undo"></i> Volver</a></div>
        </th>
    </tr>
</table>



  
      <h3>Complete la Información</h3>
  

 <form class="form-group" method="POST" enctype="multipart/form-data" href="">

    @csrf

  
     

                              <div class="input-group-append">

                                    <button class="btn btn-success" type="submit"><i class="fas fa-edit" ></i>Enviarrrrr</button>

                                </div>

</form>
    





@endsection
