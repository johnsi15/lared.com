<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registrar Usuario</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="../css/estilos.css">
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery-ui.js"></script>
	<script src="../js/bootstrap.js"></script>
	<script src="../js/jquery.validate.js"></script>
	<script src="../js/funciones.js"></script>
	<!--<script src="../js/registrar.js"></script>-->
	<!--<script src="../js/eliminar.js"></script>-->
	<style>
	    h1{
	    	text-align: center;
	    }
	    th{
	    	font-size: 28px;
	    }
	    td{
	    	font-size: 24px;
	    }
	    label.error{
			float: none; 
			color: red; 
			padding-left: .5em;
		    vertical-align: middle;
		    font-size: 12px;
		}
		label{
			color: white;
		}
	    p{
	    	color: #df0024;
	    	font-size: 20px;
	    	text-align: right;
	    }
	    textarea{
	    	/*resize: none;*/
	    	font-size: 16px;
	    	width: 250px;
	    }
	    #fondo{
	    	background: #feffff;
	       	/* box-shadow:inset -3px -2px 37px #000000; */
	    }
	    #validate2{
		    margin-left: 17%;
		}
		#userEdit{
			font-weight: bold;
		}
	    .notas{
	    	margin-left: 80px;
	    	position: fixed;
	    	top: 190px;
	    }
        .hero-unit{
        	margin-top: 30px;
        	text-align: center;
        	background-image: url('../img/Tarjeta_mario3.png');
        }
	</style>

	<script>
      $(document).ready(function(){
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
	  });//cierre del document
	</script>

	<?php
      session_start();
      if(isset($_SESSION['id_user'])){
            $user = $_SESSION['nombre'];
            $id = $_SESSION['id_user'];
      }else{
      		header('Location: index.php');
      }
	?>
</head>
<body>
	
	<header class="container" id="validate">
		<div class="hero-unit">
			<br><br><br><br><br><br><br>
		</div>
	</header>
    <!--Primer articulo... -->
	<article class="container well" id="fondo">
		<div class="navbar" id="menu-contenedor">
			<div class="navbar-inner" id="menu">
				<div class="container" >
					<a  class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a href="../menu.php" class="brand">LaRed.Com</a>
					<div class="nav-collapse">
						<ul class="nav" >
							<li><a href="../menu.php"><i class="icon-home"></i>Home</a></li>
							<li><a href="internet.php">Internet</a></li>
							<li><a href="recargas.php">Recargas</a></li>
							<li><a href="minutos.php">Minutos</a></li>
							<li><a href="vitrina.php">Vitrina</a></li>
							<li><a href="cierreDiario.php">Cierre</a></li>
							<li><a href="gastos.php"><i class="icon-bookmark"></i>Gastos</a></li>
							<li><a href="reporte.php"><i class="icon-book"></i>Reportes</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="icon-user"></i> <?php echo $user; ?> <!--Mostramoe el user logeado -->
								    <span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li class="active"><a href="#"><i class="icon-plus-sign"></i> Registrar Usuario</a></li>
									<li><a href="editarUsuario.php"><i class="icon-wrench"></i> Configuración de la cuenta</a></li>
									<li class="divider"></li>
									<li><a href="cerrar.php">Cerrar Sesion</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="span1"></div>
			<div class="span8 well" id="fondo" style="margin-left: 8%;">
				<h1>Registrar Usuario</h1><br>
				<div class="mensaje"></div><!--mensaje de confirmacion o de error-->
				<div class="span3 well" id="registrarUser" style="margin-left: 30%; background: rgba(73, 59, 42, 0.6);">
					<form action="acciones.php" method="post" id="validarRegistroUser">
						<div class="control-group">
							<label for="nombre">Nombre</label>
							<input type="text" name="nombre" id="foco" required autofocus MAXLENGTH=5>
							<label for="contraseña">Contraseña</label>
							<input type="password" name="contraseña">
						</div>
						<input type="hidden" name="registrarUser">
						<button type="submit" class="btn btn-primary">Registrar</button>
					</form>
				</div>
			</div>
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