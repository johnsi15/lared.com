<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Minutos</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/estilos.css">
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery.validate.js"></script>
	<script src="../js/funciones.js"></script>
	<script src="../js/bootstrap.js"></script>
</head>
<body>
	<style>
		h1{
			text-align: center;
		}
		label.error{
			float: none; 
			color: red; 
			padding-left: .5em;
		    vertical-align: middle;
		    font-size: 12px;
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
        }
	</style>

	<script>
      $(document).ready(function() {
		  var menu = $('#menu');
		  var contenedor = $('#menu-contenedor');
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
	
	<?php
      session_start();
      if(isset($_SESSION['id_user'])){
            $user = $_SESSION['nombre'];
      }else{
      	header('Location: ../index.php');
      }
	?>
	<header class="container">
		<div class="hero-unit">
			<p class="page-header">
			    <h1>Minutos - La Red.Com</h1>
		    </p>
		</div>
	</header>

	<article class="container well" id="fondo">
		<div class="navbar" id="menu-contenido">
			<div class="navbar-inner" id="menu">
				<div class="container">
					<a  class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a href="../menu.php" class="brand">LaRed.Com</a>
					<div class="nav-collapse">
						<ul class="nav">
							<li><a href="../menu.php">Home</a></li>
							<li><a href="internet.php">Internet</a></li>
							<li><a href="recargas.php">Recargas</a></li>
							<li class="active"><a href="minutos.php">Minutos</a></li>
							<li><a href="vitrina.php">Vitrina</a></li>
							<li><a href="reporte.php">Reportes</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									Usuario - <?php echo $user; ?> <!--Mostramoe el user logeado -->
								</a>
								<ul class="dropdown-menu">
									<li><a href="cerrar.php">Cerrar Sesion</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<?php
               require_once('funciones.php');
               $objeto = new funciones();
               if($objeto->consultaMinutos()){
               ?>
                    <script>
				       $(document).ready(function(){
				              $("#campo",this).attr("disabled","disabled");
				              $("#campo2",this).attr("disabled","disabled");
				              $("#foco").focus();
				       });
				    </script>
              <?php
               }else{
               	  ?>
               	     <script>
               	      $(document).ready(function(){
				              $("#boton",this).attr("disabled","disabled");
				       });
               	     </script>
               	  <?php
               }
			?>
			<div class="span8">
			         <a href="#mimodal" role="button" class="btn btn-primary btn-large" data-toggle="modal">Base del Dia</a>
					 <div id="mimodal" class="modal hide fade">
					 	<div class="modal-header">
					 	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
					 	    <h3>Base Minutos</h3>
					 	</div>
					 	<div class="modal-body">
					 		 <form action="acciones.php" method="post" class="form-inline" id="validate">
							    <label >Base del Dia</label>
							    <input id="campo" type="text" name="base" required autofocus>
							    <input type="hidden" name="tipoBase" value="minutos">
							    <input type="hidden" name="okMinu">
						    	<button type="submit" id="campo2" class="btn btn-primary">Bien</button>
						     </form>
					 	</div>
					 	<div class="modal-footer">
					 		<a href="#" class="btn" data-dismiss="modal">Salir</a>
					 	</div>
					 </div>
			</div>
		</div>
		<hr>
		<div class="row">
			<aside class="span2"></aside>
			<div class="span7">
				<aside id="mensaje"></aside>
			</div>
		</div>
		<div class="row">
				<div class="span4"></div>
				<div class="span3 well">
					<form action="acciones.php" method="post" id="validate3" class="limpiar">
						<div class="control-group">
			    			<label for="nombre" class="control-label">Tiempo</label>
			    			<div class="controls">
			    			   <input  type="text" name="nombre" id="foco" required>
			    			</div>
			    		</div>
			    		<div class="control-group">
			    			<label for="clave" class="control-label">Dinero</label>
			    			<div class="controls">
			    				<input type="text" name="dinero" required>
			    			</div>
		    			</div>
		    			<input type="hidden" name="tipoConcep" value="minutos">
		    			<div class="control-group">
		    				<div class="controls">
		    					 <input type="hidden" name="guardarMinu">
		    				   <button id="boton" name="guardarMinu" class="btn btn-success">Guardar</button>
		    				</div>
		    			</div>
			       </form>
				</div>
		</div>
		<div class="row">
			<div class="span3"></div>
			<div class="span4" id="resul">
				<?php
				   require_once('funciones.php');
				   $objeto = new funciones();
				   $objeto->totalDiaMinutos();
				?>
			</div>
		</div>
	</article>

	<footer class="container well">
		<div class="span7">
		   <h2><img src="../img/copyright.png" alt="Autor"> John Andrey Serrano - 2013</h2>
		</div>
		<div class="span4"> <br>
			<p>Lared.com Version 2.0</p>
		</div>
	</footer>
</body>
</html>