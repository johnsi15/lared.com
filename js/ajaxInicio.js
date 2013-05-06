$(document).ready(function(){
      //inicio de sesion....
     ///BUSCAMOS LOS CAMPOS EN TODAS LAS TABLAS-> cuando le den buscar
	    var pet = $('.span5 form').attr('action');
      var met = $('.span5 form').attr('method');

     $('.span5 form').submit(function(e){
     	         e.preventDefault();

               $.ajax({
                   beforeSend: function(){

                   },
                   url: pet,
                   type: met,
                   data: $('.span5 form').serialize(),
                   success: function(resp){
                   	   console.log(resp);
                       if(resp == "Error"){
                             setTimeout(function(){ $(".span5 .alert").fadeOut(800).fadeIn(800).fadeOut(500).fadeIn(500).fadeOut(300);}, 800); 
                             var error = '<div class="alert alert-error">'+'<button type="button" class="close" data-dismiss="alert">'+'X'+'</button>'+'<strong>'+'Nombre o Contraseña Incorrecta'+'</strong>'+'<br> Intente Nuevamente '+'</div>';
                             $('.span5 .alert').remove();
                             $('#mensaje').html(error);
                             $('#limpiar')[0].reset();///limpiamos los campos del formulario.
                             $('#foco').focus();
                       }else{
                            self.location = "menu.php";
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