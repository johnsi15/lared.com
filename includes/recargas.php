<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Recargas</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/estilos.css">
	<script src="../js/jquery.js"></script>
	<script src="../js/jquery-ui.js"></script><!--Aca no la uso pero si la necesito por el archivo registrar-->
	<script src="../js/jquery.validate.js"></script>
	<script src="../js/bootstrap.js"></script>
	<script src="../js/registrar.js"></script>
	<!--<script src="../js/recargas.js"></script>-->
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
			    <h1>Recargas - La Red.Com</h1>
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
							<li class="active"><a href="recargas.php">Recargas</a></li>
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
									<li><a href="registrarUsuario.php"><i class="icon-plus-sign"></i> Registrar Usuario</a></li>
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
			<?php
               require_once('funciones.php');
               $objeto = new funciones();
               if($objeto->consultaRecarga()){
               	?>
                    <script>
				       $(document).ready(function(){
				              //$("#campo",this).attr("disabled","disabled");
				              //$("#campo2",this).attr("disabled","disabled");
				       });
				    </script>
               	<?php
               }else{
               	   ?>
               	      <script>
               	        $(document).ready(function(){
               	        	$("#botonRecarga",this).attr("disabled","disabled");
               	        });
               	      </script>
               	   <?php
               }
			?>
			<div class="span8">
			         <a href="#mimodal" role="button" class="btn btn-primary btn-large" data-toggle="modal">Actualizar Base</a>
					 <div id="mimodal" class="modal hide fade">
					 	<div class="modal-header">
					 	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
					 	    <h3>Base Recargas</h3>
					 	</div>
					 	<div class="modal-body">
					 		 <form action="acciones.php" method="post" class="form-inline" id="validate">
							    <label >Base del Dia</label>
							    <input id="campo" type="text" name="base" required autofocus>
							    <input type="hidden" name="tipoBase" value="recarga">
							    <input type="hidden" name="okRecar">
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
					<form action="acciones.php" method="post">
						<input type="hidden" name="nombre" value="recarga">
			    		<div class="control-group">
			    			<label for="clave" class="control-label">Dinero</label>
			    			<div class="controls">
			    				<!-- <input type="text" name="dinero" required> -->
			    				<select name="dinero" id="recar">
			    					<option value="1000">1000</option>
			    					<option value="2000">2000</option>
			    					<option value="3000">3000</option>
			    					<option value="5000">5000</option>
			    					<option value="10000">10.000</option>
			    					<option value="20000">20.000</option>
			    					<option value="30000">30.000</option>
			    					<option value="50000">50.000</option>
			    				</select>
			    			</div>
		    			</div>
		    			<input type="hidden" name="tipoConcep" value="recarga">
		    			<div class="control-group">
		    				<div class="controls">
		    					<input type="hidden" name="guardarRecar">
		    				   <button type="submit" id="botonRecarga" name="guardarRecar" class="btn btn-success">Guardar</button>
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
				   $objeto->totalDiaRecargas();
				?>
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