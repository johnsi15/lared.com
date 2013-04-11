<?php
   require_once('config.php');
   $bd = new conexion();
   $bd->conectar();

   session_start();
     if($_SESSION['id_user']){
         session_destroy();
         echo '<script>
				alert("su sesion ha terminado correctamente")
				self.location = "../index.php"
				</script>';
     }else{
     	echo '<script>
				alert("No ha iniciado ninguna sesión, por favor regístrese")
				self.location = "../index.php"
				</script>';
     }
?>