$(document).ready(function(){
      //inicio de sesion....
     ///BUSCAMOS LOS CAMPOS EN TODAS LAS TABLAS-> cuando le den buscar
      var pet = $('#calculo form').attr('action');
      var met = $('#calculo form').attr('method');

     $('#calculo form').on('click','#calcularCierre',function(e){
               e.preventDefault();
               $.ajax({
                   beforeSend: function(){

                   },
                   url: pet,
                   type: met,
                   data: $('#calculo form').serialize(),
                   success: function(resp){
                       console.log(resp);
                       if(resp == "Error"){
                             setTimeout(function(){ $("#mensajeCalculo .alert").fadeOut(800).fadeIn(800).fadeOut(500).fadeIn(500).fadeOut(300);}, 800); 
                             var error = '<div class="alert alert-error">'+'<button type="button" class="close" data-dismiss="alert">'+'X'+'</button>'+'<strong>'+'Error'+'</strong>'+'<br> No hay Datos '+'</div>';
                             $('#fondo .alert').remove();
                             $('#mensajeCalculo').html(error);
                       }else{
                          $('#resultado').empty();//limpiar la tabla.
                          $('#resultado').html(resp);//imprimir datos de la tabla.
                          setTimeout(function(){ $("#mensajeCalculo .alert").fadeOut(800).fadeIn(800).fadeOut(500).fadeIn(500).fadeOut(300);}, 800); 
                          var exito = '<div class="alert alert-success">'+'<button type="button" class="close" data-dismiss="alert">'+'X'+'</button>'+'<strong>'+'Exito'+'</strong>'+' Calculo Hecho'+'</div>';
                          $('#mensajeCalculo').html(exito);//impresion del mensaje exitoso.
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
