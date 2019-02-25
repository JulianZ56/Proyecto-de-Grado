
//De acuerdo a la nacionalidad escogida filtra sus departamentos
$(function(){
    $("#select-nacionalidad").on("change", onSelectnacionalidad);   
});     
       
function onSelectnacionalidad(){
    var nacionalidad_id = $(this).val();

    if(nacionalidad_id){
        $('#Departamento').prop('disabled', false);
        $.get('/Registro/editar/departamento/'+nacionalidad_id+'' , function (data) {       
        var html_select='<option value="" >-----Seleccione Departamento-----</option>';
        for(var i=0; i<data.length; ++i)
        html_select += '<option value="'+data[i].id+'">'+data[i].nombreDepartamento+'</option>';
        $('#Departamento').html(html_select);
    });

    }else if(!nacionalidad_id){
        $('#Departamento').html('<option value="">----Seleccione Departamento----</option>');
            return;
    }    
}

//De acuerdo al departamento escogida filtra sus ciudades
$(function(){
    $("#Departamento").on("change", onSelectCiudad);
});

function onSelectCiudad(){
    var departamento_id = $(this).val();

    if(departamento_id){
        $('#Ciudad').prop('disabled', false);
      $.get('/Registro/editar/ciudad/'+departamento_id+'' , function (data) {       
        var html_select2='<option value="" >-------Seleccione Ciudad-------</option>';
        for(var i=0; i<data.length; ++i)
        html_select2 += '<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
        $('#Ciudad').html(html_select2);
    });

    }else if(!departamento_id){
    $('#Ciudad').html('<option value="">------Seleccione Ciudad------</option>');
        return;
    }
}

//De acuerdo a la ciudad escogida filtra sus comunas
$(function(){
    $("#Ciudad").on("change", onSelectComuna);
});

function onSelectComuna(){
    var ciudad_id = $(this).val();

    if(ciudad_id){
        $('#Comuna').prop('disabled', false);
      $.get('/Registro/editar/comuna/'+ciudad_id+'' , function (data) {       
        var html_select3='<option value="" >-------Seleccione Comuna-------</option>';
        for(var i=0; i<data.length; ++i)
        html_select3 += '<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
        $('#Comuna').html(html_select3);
    });

    }else if(!ciudad_id){
    $('#Comuna').html('<option value="">------Seleccione Comuna------</option>');
        return;
    }
}

//De acuerdo a la comuna escogida filtra sus barrios
$(function(){
    $("#Comuna").on("change", onSelectBarrio);
});

function onSelectBarrio(){
    var comuna_id = $(this).val();

    if(comuna_id){
        $('#Barrio').prop('disabled', false);
      $.get('/Registro/editar/barrio/'+comuna_id+'' , function (data) {       
        var html_select4='<option value="" >-------Seleccione Barrio-------</option>';
        for(var i=0; i<data.length; ++i)
        html_select4 += '<option value="'+data[i].id+'">'+data[i].nombre+'</option>';
        $('#Barrio').html(html_select4);
    });

    }else if(!comuna_id){
    $('#Barrio').html('<option value="">------Seleccione Barrio------</option>');
        return;
    }
}
