<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Inicio</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/ajaxInicio.js"></script>
</head>
    <style>
       body{

       }
       #centrar{
       	text-align: center;
       }
       #fondo{
       	  background-color: white;
       }
       #form{
       	 margin-left: 55px;
       }
       .hero-unit{
       	   margin-top: 30px;
       	   text-align: center;
       }
    </style>
<body>
    <?php  
       //Iniciar Sesión
       session_start();//iniciamos una session con session_start es necesario para poder definir o usar las variables de session
        //Validar si se está ingresando con sesión correctamente
        if (isset($_SESSION['id_user'])){
            header('Location: menu.php');//si esta bien la session lo mandamos al menu principal...
        }else{
        }    
    ?>
	<header class="container">
		<div class="hero-unit">
			<p class="page-header">
		      <h1>La Red.Com</h1>	
			</p>
		</div>
	</header>
	<!-- contenido de la pagina-->
    <article class="container well" id="fondo">
    	<div class="row">
    		<div class="span5"><br><br>
    			<form  action="includes/acciones.php" method="post" class="well">
		    		<div class="control-group" id="form">
		    			<label for="nombre" class="control-label">Nombre</label>
		    			<div class="controls">
		    			   <input type="text" name="nombre" placeholder="Usuario">
		    			</div>
		    		</div>
		    		<div class="control-group" id="form">
		    			<label for="clave" class="control-label">Password</label>
		    			<div class="controls">
		    				<input type="password" name="clave" placeholder="Contraseña">
		    			</div>
	    			</div>
	    			<div class="control-group" id="form">
              <div class="controls">
                 <button type="submit" name="login" class="btn btn-primary">Iniciar Sesión</button>
	    				</div>
	    			</div>
    			</form>
    			<aside id="mensaje"></aside>
    		</div>
    		<div class="span6">
    			<ul class="thumbnails">
    				<li class="span7">
    					<a href="#" class="thumbnail">
    			           <img src="img/Tarjeta_mario3.png" alt="Tarjeta">
    					</a>
    				</li>
    			</ul>
    		</div>
    	</div>
    </article>
    <!-- pie de pagina-->
	<footer class="container well">
		<h2 id="centrar"><img src="img/copyright.png" alt="Autor"> John Andrey Serrano - 2013</h2>
	</footer>
</body>
</html>