<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>reportePorConcepto</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/smoothness/jquery-ui.css">
	<!-- <link rel="stylesheet" href="../css/estilos.css"> -->
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery-ui.js"></script>
	<script src="../js/modificar.js"></script>
	<script src="../js/bootstrap.js"></script>
	<style>
		h1{
			text-align: center;
		}
		th{
			font-size: 23px;
		}
		td{
			font-size: 18px;
		}
		p{
	    	color: #df0024;
	    	font-size: 20px;
	    	text-align: right;
	    }
		#fondo{
			background: #feffff;
		}
        .hero-unit{
        	margin-top: 30px;
        	text-align: center;
        	background-image: url('../img/Tarjeta_mario3.png');
        }
        .menu-fijo {
		    position: fixed;
		    top: 0;
		    width: 145px;
		}
        .span2 aside{
           font-size: 17px;
        }
	</style>
	<script>
      $(document).ready(function() {
		  var menu = $('#bloque');
		  var contenedor = $('#bloque-contenedor');
		  var menu_offset = menu.offset();
		  // Cada vez que se haga scroll en la página
		  // haremos un chequeo del estado del menú
		  // y lo vamos a alternar entre 'fixed' y 'static'.
		  $(window).on('scroll', function() {
		    if($(window).scrollTop() > menu_offset.top) {
		      menu.addClass('menu-fijo');
		    } else {
		      menu.removeClass('menu-fijo');
		    }
		  });
	  });
	</script>
</head>
<body>
	<?php
      session_start();
      if(isset($_SESSION['id_user'])){
			   if(isset($_GET["pagina"])){
			   	 $num_pag = $_GET["pagina"];
			   }else{
			   	 $num_pag = 1;
			   }
      }else{
      	header('Location: ../index.php');
      }
	?>
	<header class="container">
		<div class="hero-unit">
			<br><br><br><br><br><br><br><br>
		</div>
	</header>
     <!-- Aca va el codigo del modal para modificar los datos-->
     <div class="hide" id="editarRegistro" title="Editar Registro">
     	<form action="acciones.php" method="post">
     		<input type="hidden" id="id_registro" name="id_registro" value="0">
     		<div class="control-group">
     			<label for="nombre" class="control-label">Nombre</label>
     			<div class="controls">
     				<input type="text" name="nombre" id="nombre" required autofocus>
     			</div>
     		</div>
     		<div class="control-group">
     			<label for="dinero" class="control-label">Dinero</label>
     			<div class="controls">
     				<input type="text" name="dinero" id="dinero">
     			</div>
     		</div>
     		<div class="control-group">
     			<label for="gurdar" class="control-label"></label>
     			<div class="controls">
     				 <input type="hidden" name="editConcepto">
     				<button type="submit" class="btn btn-success">Modificar</button>
     			</div>
     		</div>
     	</form>
     </div>
     
	<article class="container well" id="fondo">
		<div class="row">
			<aside><h1>Reporte Por Concepto</h1></aside><br><br>
			<div class="span2"> <div id="bloque"><aside class="well" id="bloque-contenedor">Pagina N° <strong><?php echo $num_pag; ?></strong></aside></div></div>
		    <div class="span8">
		    	<div class="mensaje"></div>
		    	<table class="table table-hover table-bordered">
		    		<thead>
		    			<tr>
		    				<th>Nombre</th>
		    				<th>Dinero</th>
		    				<th>Tipo</th>
		    				<th>Fecha</th>
		    			</tr>
		    		</thead>
		    		<tbody id="result">
		    			<?php 
		    			     require_once('funciones.php');
		    	 			 $objeto = new funciones();
         			 		 $objeto->buscarReporteConcepto();
		    			?>
		    		</tbody>
		    	</table>
		    	 <div id="paginacion">
		    	 	 <?php 
		    	 	  require_once('funciones.php');
		    	 	  $objeto = new funciones();
		    	 	  $objeto->paginacion();
			    	 ?>
		    	 </div>
		    </div>
		</div>
		<div class="row">
			
		</div>
	</article>

	<footer class="container well">
		<div class="span7">
		   <h2><img src="../img/copyright.png" alt="Autor"> John Andrey Serrano - 2013</h2>
		</div>
		<div class="span4"> <br>
			<p>Lared.com Version 3.0</p>
		</div>
	</footer>
</body>
</html>