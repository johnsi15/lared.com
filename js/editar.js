$(document).ready(function(){
	/*EDITAR O MODIFICAR DATOS DEL CIERRE DEL DIA.....*/
	 $('#formulario').dialog({//con esto cargamos los formulario de los gastos y de los cierre no es necesario repetir el codigo
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
      $('body').on('click','#editCierre',function(e){
            e.preventDefault();
      	// alert($(this).attr('href'));
      	$('#id_registro').val($(this).attr('href'));
      	//abreimos el formulario
            $('#formulario').dialog('open');
            //estraemos los campos.
            $('#dia').val($(this).parent().parent().children('td:eq(1)').text());
            $('#dinero').val($(this).parent().parent().children('td:eq(0)').text());
      });

      /*aca cargo la peticon y el metodo para ambos casos no es necesario repetir el codigo*/
      var pet = $('#formulario form').attr('action');
      var met = $('#formulario form').attr('method');

      /*metodo ajax para modificar el cierre*/
      $('#formulario form').on('click','#bienCierre',function(e){
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
      	    			setTimeout(function(){ $(".mensaje .alert").fadeOut(800).fadeIn(800).fadeOut(500).fadeIn(500).fadeOut(300);}, 800); 
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

    /*EDITAR O MODIFICAR DATOS DE LOS GASTOS........*/
      //editar Registro
      $('body').on('click','#editGasto',function(e){
            e.preventDefault();
      	// alert($(this).attr('href'));
      	$('#id_registro').val($(this).attr('href'));
      	//abreimos el formulario
            $('#formulario').dialog('open');
            //estraemos los campos.
            $('#dinero').val($(this).parent().parent().children('td:eq(0)').text());
            var tipoGasto =$(this).parent().parent().children('td:eq(1)').text();
            $('#tgasto option[value="'+tipoGasto+'"]').attr('selected',true);
      });
      /*___________*/
      $('#formulario form').on('click','#bienGasto',function(e){
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
      	    			setTimeout(function(){ $(".mensaje .alert").fadeOut(800).fadeIn(800).fadeOut(500).fadeIn(500).fadeOut(300);}, 800); 
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
    
    

});//cierrre del document...