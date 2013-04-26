$(document).ready(function(){
      //funcionalidad de formulario con jQuery Ui
      $('#formulario').dialog({
            autoOpen: false,
            modal: true,
            width:280,
            height:'auto',
            resizable: false,
            close:function(){
                  $('#id_registro').val('0');
            }
      });
      //editar Registro
      $('body').on('click','#edit',function(e){
            e.preventDefault();
      	// alert($(this).attr('href'));
      	$('#id_registro').val($(this).attr('href'));
      	//abreimos el formulario
            $('#formulario').dialog('open');
            //estraemos los campos.
            $('#dia').val($(this).parent().parent().children('td:eq(1)').text());
            $('#dinero').val($(this).parent().parent().children('td:eq(0)').text());
      });

      //editar registro de la tabla ajax
      var pet = $('#formulario form').attr('action');
      var met = $('#formulario form').attr('method');
       
      $('#formulario form').on('click','#bien',function(e){
      	    e.preventDefault();

      	    $.ajax({
      	    	beforeSend: function(){

      	    	},
      	    	url: pet,
      	    	type: met,
      	    	data: $('#formulario form').serialize(),
      	    	success: function(resp){
      	    		console.log(resp);
      	    		if(resp == "Error"){

      	    		}else{
      	    			$('#resul').empty();//limpiar los datos
      	    			$('#resul').html(resp);
      	    			$('#formulario').dialog('close');
      	    			setTimeout(function(){ $(".span4 .alert").fadeOut(800).fadeIn(800).fadeOut(500).fadeIn(500).fadeOut(300);}, 800); 
                              var exito = '<div class="alert alert-info">'+'<button type="button" class="close" data-dismiss="alert">'+'X'+'</button>'+'<strong>'+'Modificado '+'</strong>'+' el registro se modifico correctamente'+'</div>';
      	    			$('.mensaje').html(exito);
                             // $('#paginacion').empty();//limpiar los datos
                              //$('#paginacion').load('paginacion.php');
      	    		}
      	    	},
      	    	error: function(jqXHR,estado,error){
      	    		console.log(estado);
      	    		console.log(error);
      	    	},
      	    	complete: function(jqXHR,estado){
      	    		console.log(estado);
      	    	},
      	    	timeout: 10000 //10 segundos.
      	    });
      });
    /*___________________________________________________________________*/
    


});///cierre del document......