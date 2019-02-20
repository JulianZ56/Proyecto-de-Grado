$(function() {
    var $res = $('#resultado'),
        $select = $('#select');
    
   
    function mostrarOpcionSeleccionada() {
      var $option = $select.find('option:selected');

      var elemento = document.getElementById('brayan');
      elemento.style.display = 'block';


      $('#resultado').text($option.text()  +  'Recuerde que al Guardar el Empleado este Tramite quedara asignado a el');
 
    }
  
    $select.on('change',mostrarOpcionSeleccionada);
     
    $select.trigger('change');
  });