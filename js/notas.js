$(document).ready(function(){
	///BUSCAMOS LOS CAMPOS EN TODAS LAS TABLAS-> cuando le den buscar
	    var pet = $('.span4 form').attr('action');
      var met = $('.span4 form').attr('method');

     $('.span4 form').submit(function(e){
     	         e.preventDefault();
               $.ajax({
                   beforeSend: function(){

                   },
                   url: pet,
                   type: met,
                   data: $('.span4 form').serialize(),
                   success: function(resp){
                   	   console.log(resp);
                       if(resp == "Error"){
                             setTimeout(function(){ $(".span4 .alert").fadeOut(800).fadeIn(800).fadeOut(500).fadeIn(500).fadeOut(300);}, 800); 
                             var error = '<div class="alert alert-error">'+'<button type="button" class="close" data-dismiss="alert">'+'X'+'</button>'+'<strong>'+'Nombre o Contraseña Incorrecta'+'</strong>'+'<br> Intente Nuevamente '+'</div>';
                             $('.span4 .alert').remove();
                             $('#mensaje').html(error);
                       }else{
	                        $('#foco').empty();//limpiar la tabla.
	                        $('#foco').html(resp);//imprimir datos de la tabla.
	                        $('#foco').focus();///indicamos el foco al primer valor del formulario.
                       }
                   },
                   error: function(jqXHR,estado,error){
                       console.log(estado);
                       console.log(error);
                   },
                   complete: function(jqXHR,estado){
                       console.log(estado);
                   },
                   timeout: 10000//10 segundos.
               });
     }); 
});//cierre del document...