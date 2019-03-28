//De acuerdo a la dependencia escogida filtra sus catalogos 
$(function(){
    $("#Dependencia").on("change", onSelectcatalogo);   
});     
       
function onSelectcatalogo(){
    var dependencia_id = $(this).val();

    if(dependencia_id){
        $('#Catalogo').prop('disabled', false);
        $.get('/superuser/tramites/editar/catalogos/'+dependencia_id+'' , function (data) {       
        var html_select='<option value="" >-----Seleccione Catalogo-----</option>';
        for(var i=0; i<data.length; ++i)
        html_select += '<option value="'+data[i].id+'">'+data[i].nombreCatalogo+'</option>';
        $('#Catalogo').html(html_select);
    });
        

    }else if(!dependencia_id){
        $('#Catalogo').html('<option value="">----Seleccione Catalogo----</option>');
        
            return;
    }    
}




$(function(){
    $("#Dependencia").on("change", onSelectcatalogoD);   
});     
       
function onSelectcatalogoD(){
    var dependencia_id = $(this).val();

    if(dependencia_id){
        $('#Catalogo').prop('disabled', false);
        
        $.get('/empleadojefe/tramites/Re-DependenciaF/'+dependencia_id+'' , function (data) {       
        var html_select4='<option value="" >-----Seleccione Catalogo-----</option>';
        for(var i=0; i<data.length; ++i)
        html_select4 += '<option value="'+data[i].id+'">'+data[i].nombreCatalogo+'</option>';
        $('#Catalogo').html(html_select4);
    });
        

    }else if(!dependencia_id){
        $('#Catalogo').html('<option value="">----Seleccione Catalogo----</option>');
        
            return;
    }    
}








$(function(){
    $("#Dependencia").on("change", onSelectcatalogo1);   
});     
       
function onSelectcatalogo1(){
    var dependencia_id = $(this).val();

    if(dependencia_id){
        $('#Catalogo').prop('disabled', false);
        
        $.get('/solicitante/CrearSolicitud/crear/'+dependencia_id+'' , function (data) {       
        var html_select4='<option value="" >-----Seleccione Catalogo-----</option>';
        for(var i=0; i<data.length; ++i)
        html_select4 += '<option value="'+data[i].id+'">'+data[i].nombreCatalogo+'</option>';
        $('#Catalogo').html(html_select4);
    });
        

    }else if(!dependencia_id){
        $('#Catalogo').html('<option value="">----Seleccione Catalogo----</option>');
        
            return;
    }    
}

//De acuerdo a el catalogo muestra descipcion
$(function(){
    $("#Catalogo").on("change", observar);   
});     
       
function observar(){
    var catalogo_id = $(this).val();

    if(catalogo_id){ 
        
        $.get('/solicitante/CrearSolicitud/descripcion/'+catalogo_id+'' , function (data) {       
        var html_select4='';
        for(var i=0; i<data.length; ++i)
        html_select4 += '<p align="center" style="color:blue;"><strong>'+data[i].descripcionCatalogo+'</strong></p>';
        $('#des').html(html_select4);
    });
        

    }else if(!catalogo_id){
        $('#des').html('<option value="">----No se encontro descripcion----</option>');
        
            return;
    }    
}

//De acuerdo a la dependencia escogida filtra sus empleados
$(function(){
    $("#Dependencia").on("change", onSelectempleado);     
});     
       
function onSelectempleado(){
    var dependencia_id = $(this).val();

    if(dependencia_id){
        $('#Empleado').prop('disabled', false);
        $.get('/superuser/tramites/editar/empleados/'+dependencia_id+'' , function (data) {       
            var html_select2='<option value="" >-----Seleccione Empleado-----</option>';
            for(var i=0; i<data.length; ++i)
            html_select2 += '<option value="'+data[i].id+'">'+data[i].nombreEmp+'</option>';
            $('#Empleado').html(html_select2);
        });

    }else if(!dependencia_id){
        $('#Empleado').html('<option value="">----Seleccione Empleado----</option>');
            return;
    }    
}

//De acuerdo a la dependencia escogida filtra sus empleados para el empleado jefe
$(function(){
    $("#Dependencia").on("change", onSelectempleado1);     
});     
       
function onSelectempleado1(){
    var dependencia_id = $(this).val();

    if(dependencia_id){
        $('#Empleado').prop('disabled', false);
        $.get('/superuser/empleadojefe/crear/filtro/'+dependencia_id+'' , function (data) {       
            var html_select3='<option value="" >-----Seleccione Empleado-----</option>';
            for(var i=0; i<data.length; ++i)
            html_select3 += '<option value="'+data[i].id+'">'+data[i].nombreEmp+'</option>';
            $('#Empleado').html(html_select3);
        });

    }else if(!dependencia_id){
        $('#Empleado').html('<option value="">----Seleccione Empleado----</option>');
            return;
    }    
}