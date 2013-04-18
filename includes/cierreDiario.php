<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Cierre del Dia</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="../css/estilos.css">
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery-ui.js"></script>
	<script src="../js/jquery.validate.js"></script>
	<script src="../js/funciones.js"></script>
	<script src="../js/editarCierre.js"></script>
	<script src="../js/calcularCierre.js"></script>
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
	    tr,td{
	    	font-size: 20px;
	    }
		#fondo{
			background: #feffff;
		}
		#formulario{
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
		    $('#foco').focus();
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
			    <h1>Cierre del Dia - La Red.Com</h1>
		    </p>
		</div>
	</header>

	<article class="container well" id="fondo">
		<div class="navbar" id="menu-contenedor">
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
							<li><a href="../menu.php"><i class="icon-home"></i>Home</a></li>
							<li><a href="internet.php">Internet</a></li>
							<li><a href="recargas.php">Recargas</a></li>
							<li><a href="minutos.php">Minutos</a></li>
							<li><a href="vitrina.php">Vitrina</a></li>
							<li class="active"><a href="cierreDiario.php">Cierre Dia</a></li>
							<li><a href="reporte.php"><i class="icon-book"></i>Reportes</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="icon-user"></i> <?php echo $user; ?> <!--Mostramoe el user logeado -->
								    <span class="caret"></span>
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
         <h1>Cierre del Dia </h1><br><br>
		<div class="tabbale tabs-left">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#tab1" data-toggle="tab"> <strong>Hacer Cierre</strong></a></li>
				<li><a href="#tab2" data-toggle="tab"><strong>Ver Cierres</strong></a></li>
				<li><a href="#tab3" data-toggle="tab"><strong>Calcular Cierres</strong></a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="tab1">
					<div class="span3 well" id="fondo">
						<?php  date_default_timezone_set('America/Bogota');
                                           $fecha = date("Y-m-d");
                                           $dia = date("l");
                                           if($dia=="Monday"){
                                           	echo "<strong>Hoy es Lunes </strong>";
                                           	$dia = "Lunes";
                                           }else if($dia=="Tuesday"){
                                           	echo "<strong>Hoy es Martes </strong>";
                                           	$dia = "Martes";
                                           }else if($dia=="Wednesday"){
                                           	echo "<strong>Hoy es Miercoles </strong>";
                                           	$dia = "Miercoles";
                                           }else if($dia=="Thursday"){
                                           	echo "<strong>Hoy es Jueves </strong>";
                                           	$dia = "Jueves";
                                           }else if($dia=="Friday"){
                                           	echo "<strong>Hoy es Viernes </strong>";
                                           	$dia = "Viernes";
                                           }else if($dia=="Saturday"){
                                           	echo "<strong>Hoy es Sabado </strong>";
                                           	$dia = "Sabado";
                                           }else if($dia=="Sunday"){
                                           	echo "<strong> Hoy es Domingo</strong>";
                                           	$dia = "Domingo";
                                           }
                                           echo $fecha;?><br><br>
						<form action="acciones.php" method="post" id="cierre" class="limpiar">
							<label for="dinero">Dinero</label>
							<input type="text" name="dinero" id="foco" required autofocus>
							<label for="fecha">Fecha</label>
							<input type="date" name="fecha">
							<input type="hidden" name="cierre"><br>
							<button type="submit" name="cierre" class="btn btn-inverse">Hacer Cierre</button>
						</form>
					</div>
					<div class="span6">
						<div id="mensaje"></div>
					</div>
				</div>
				<div class="tab-pane" id="tab2">
					<div class="span5">
						 <table class="table table-hover table-bordered">
						 	<thead>
						 		<tr>
						 			<th>Fecha</th>
						 			<th>Dia</th>
						 			<th>Dinero</th>
						 		</tr>
						 	</thead>
						 	<tbody id="resul">
						 		<?php
						 		  require_once('funciones.php');
						 		  $objeto = new funciones();
						 		  $objeto->verCierres();
						 		?>
						 	</tbody>
						 </table>
					</div>
					<div class="span4">
						<div class="mensaje"></div>
  					<!-- Aca va el codigo del modal para modificar los datos-->
						<div class="hide" id="formulario" title="Editar Cierre">
							<form action="acciones.php" method="post">
					     		<input type="hidden" id="id_registro" name="id_registro" value="0">
					     		<div class="control-group">
					     			<label for="nombre" class="control-label">Dia</label>
					     			<div class="controls">
					     				<input type="text" name="dia" id="dia">
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
					     				 <input type="hidden" name="editCierre">
					     				<button id="bien" class="btn btn-success">Modificar</button>
					     			</div>
					     		</div>
					     	</form>
						</div>
					</div>
				</div>

                <div class="tab-pane" id="tab3">
                	<div class="span3 well" id="calculo" style="background: #feffff;">
						<form action="acciones.php" method="post">
							<label for="fecha" id="fuente">Fecha Inicial</label>
							<input type="date" name="fecha1">
							<label for="fecha2" id="fuente">Fecha Final</label>
							<input type="date" name="fecha2">
							<input type="hidden" name="calcularCierre"><br><br>
							<button type="submit" name="calcularCierre" id="calcularCierre" class="btn btn-success">Calcular</button>
						</form>
					</div>
					<div class="span5 well" id="resultado" style="background: #feffff;">
						<h3 class="well"> Calculo: </h3>
					</div>
                </div>
			</div><!--Final de tab del contenido -->
		        <div id="mensajeCalculo"></div>
		</div>
	</article>


	<footer class="container well">
		<div class="span7">
		   <h2><img src="../img/copyright.png" alt="Autor"> John Andrey Serrano - 2013</h2>
		</div>
		<div class="span4"> <br>
			<p>Lared.com Version 2.5</p>
		</div>
	</footer>
</body>
</html>