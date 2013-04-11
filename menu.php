<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Menu</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/estilos.css">
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/notas.js"></script>
</head>
<body>
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
	    }
	    .notas{
	    	margin-left: 80px;
	    	position: fixed;
	    	top: 190px;
	    }
        .hero-unit{
        	margin-top: 30px;
        	text-align: center;
        	background-image: url('img/Tarjeta_mario3.png');
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

		  var cuadro = $('#recuadro');
		  var cuadro_offset = cuadro.offset();
		  // Cada vez que se haga scroll en la página
		  // haremos un chequeo del estado del menú
		  // y lo vamos a alternar entre 'fixed' y 'static'.
		  $(window).on('scroll', function() {
		    if($(window).scrollTop() > cuadro_offset.top) {
		      cuadro.addClass('notas');
		      $("#recuadro").css("display", "block");
		    } else {
		      $("#recuadro").css("display", "none");
		      cuadro.removeClass('notas');
		    }
		  });
	  });
	</script>
	<?php
      session_start();
      if(isset($_SESSION['id_user'])){
            $user = $_SESSION['nombre'];
      }else{
      	header('Location: index.php');
      }
	?>
	<!-- CUADRO DE NOTAS......-->
	<div class="span3" id="recuadro" style="display: none;">
		<form action="includes/acciones.php" method="post">
			<div class="control-group">
			   	<label for="Notas"><strong>Notas:</strong></label>
			   	<div class="controls"><!-- Tener en cuenta el texarea deja espacion si no se acomoda las llaves del php seguidas ok -->
				    <textarea name="nota" id="foco" cols="0" rows="7" autofocus><?php require_once("includes/funciones.php"); $objeto = new funciones(); $objeto->verNota();
				    ?></textarea>
			   	</div>
			   	<input type="hidden" name="notas">
			    <button class="btn btn-inverse">Guardar</button>
		    </div>
		</form>
	</div>
    

	<header class="container">
		<div class="hero-unit">
			<br><br><br><br><br><br><br>
		</div>
	</header>
	<article class="container well" id="fondo">
		<div class="navbar" id="menu-contenedor">
			<div class="navbar-inner" id="menu">
				<div class="container" >
					<a  class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a href="menu.php" class="brand">LaRed.Com</a>
					<div class="nav-collapse" >
						<ul class="nav" >
							<li class="active"><a href="menu.php">Home</a></li>
							<li><a href="includes/internet.php">Internet</a></li>
							<li><a href="includes/recargas.php">Recargas</a></li>
							<li><a href="includes/minutos.php">Minutos</a></li>
							<li><a href="includes/vitrina.php">Vitrina</a></li>
							<li><a href="includes/reporte.php">Reportes</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									Usuario - <?php echo $user; ?> <!--Mostramoe el user logeado -->
								</a>
								<ul class="dropdown-menu">
									<li><a href="includes/cerrar.php">Cerrar Sesion</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="span3"> <aside><strong>Fecha: <?php 
			                               date_default_timezone_set('America/Bogota');
                                           $fecha = date("Y-m-d");
                                           echo $fecha;
                                        ?></strong></aside>
            </div>
			<div class="span7 well" id="fondo">
				<h1>Base del Dia</h1>
				<table class="table table-hover table-bordered">
					<thead>
						<tr>
							<th>Internet</th>
							<th>Recargas</th>
							<th>Minutos</th>
							<th>Vitrina</th>
						</tr>
					</thead>
					<tbody>
						<?php
						   require_once('includes/funciones.php');
               			   $objeto = new funciones();
						   $objeto->reporteBases();
						?>
					</tbody>
				</table>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="span3"></div>
			<div class="span7 well" id="fondo">
				<h1>Total del Dia</h1>
				<table class="table table-hover table-bordered">
					<thead>
						<tr>
							<th>Internet</th>
							<th>Recargas</th>
							<th>Minutos</th>
							<th>Vitrina</th>
						</tr>
					</thead>
					<tbody>
						<?php
						   require_once('includes/funciones.php');
               			   $objeto = new funciones();
						   $objeto->reporteDiario();
						?>
					</tbody>
				</table>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="span2"></div>
			<div class="span8 well" id="fondo">
			    <aside><h1>Precios La Red.Com</h1></aside>
				<table class="table table-hover table-bordered table-striped ">
					<thead>
						<tr>
							<th>Concepto</th>
							<th>Precio</th>
						</tr>
					</thead>
					<tbody>
				        <tr>
				        	<td>Impresion ByN</td>
				        	<td>$200</td>
				        </tr>
				         <tr>
				        	<td>Impresion ByN mas de 10</td>
				        	<td>$150</td>
				        </tr>
				        <tr>
				        	<td>Impresion Color</td>
				        	<td>$500</td>
				        </tr>
				        <tr>
				        	<td>Impresion Color mas de 10</td>
				        	<td>$300</td>
				        </tr>
				        <tr>
				        	<td>Copias ByN</td>
				        	<td>$100</td>
				        </tr>
				        <tr>
				        	<td>Copias ByN mas de 20</td>
				        	<td>$80</td>
				        </tr>
				        <tr>
				        	<td>Copias Color</td>
				        	<td>$200</td>
				        </tr>
				        <tr>
				        	<td>Copias Color mas de 20</td>
				        	<td>$150</td>
				        </tr>
				        <tr>
				        	<td>Consultas</td>
				        	<td>$300</td>
				        </tr>
				        <tr>
				        	<td>Quema de Cd Dvd</td>
				        	<td>$1000 o $2000</td>
				        </tr>
					</tbody>
				</table>
			</div>
		</div>
	</article>

	<footer class="container well">
		<div class="span7">
		   <h2><img src="img/copyright.png" alt="Autor"> John Andrey Serrano - 2013</h2>
		</div>
		<div class="span4"> <br>
			<p>Lared.com Version 2.0</p>
		</div>
	</footer>
</body>
</html>