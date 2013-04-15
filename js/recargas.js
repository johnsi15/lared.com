$(document).ready(function(){
      //inicio de sesion....
     ///BUSCAMOS LOS CAMPOS EN TODAS LAS TABLAS-> cuando le den buscar
      var pet = $('.span3 form').attr('action');
      var met = $('.span3 form').attr('method');

     $('.span3 form').submit(function(e){
               e.preventDefault();

               $.ajax({
                   beforeSend: function(){

                   },
                   url: pet,
                   type: met,
                   data: $('.span3 form').serialize(),
                   success: function(resp){
                       console.log(resp);
                       if(resp == "Error"){
                             setTimeout(function(){ $("#mensaje .alert").fadeOut(800).fadeIn(800).fadeOut(500).fadeIn(500).fadeOut(300);}, 800); 
                             var error = '<div class="alert alert-error">'+'<button type="button" class="close" data-dismiss="alert">'+'X'+'</button>'+'<strong>'+'Error'+'</strong>'+'<br> No se Pudo registrar '+'</div>';
                             $('.span3 .alert').remove();
                             $('#mensaje').html(error);
                       }else{
                            $('#resul').empty();//limpiar la tabla.
                          $('#resul').html(resp);//imprimir datos de la tabla.
                          setTimeout(function(){ $("#mensaje .alert").fadeOut(800).fadeIn(800).fadeOut(500).fadeIn(500).fadeOut(300);}, 800); 
                          var exito = '<div class="alert alert-success">'+'<button type="button" class="close" data-dismiss="alert">'+'X'+'</button>'+'<strong>'+'Registro guardado '+'</strong>'+' el registro se agrego correctamente'+'</div>';
                          $('#mensaje').html(exito);//impresion del mensaje exitoso.
                          $('.limpiar')[0].reset();///limpiamos los campos del formulario.
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

}); //final de document
