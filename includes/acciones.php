<?php
    require_once('funciones.php');
    $objeto = new funciones();
    $refres = new funciones();
   //login de usuarios
   if(isset($_POST['clave'])){
        $user = $_POST['nombre'];
        $pass = $_POST['clave'];
		//sleep(1);
        if($objeto->login($user,$pass)){
            echo "Bien";
            //header('Location: ../menu.php');
        }else{
        	echo "Error";
        }
   }

   if(isset($_POST['ok'])){
        $base = $_POST['base'];
        $tipoB = $_POST['tipoBase'];
        date_default_timezone_set('America/Bogota'); 
        $fecha = date("Y-m-d");
        $objeto->registrarBase($base,$fecha,$tipoB);
        header('Location: internet.php');
   }

   if(isset($_POST['guardar'])){
        $nombre = $_POST['nombre'];
        $dinero = $_POST['dinero'];
        $tipoConcep = $_POST['tipoConcep'];
        if($nombre=='' and $dinero==''){
           echo "Error";
        }else{
           $objeto->registrarConcepto($nombre,$dinero,$tipoConcep);
           $objeto->totalDiaInternet();
        }
        //header('Location: internet.php');
   }

   if(isset($_POST['okRecar'])){
        $base = $_POST['base'];
        $tipoB = $_POST['tipoBase'];
        date_default_timezone_set('America/Bogota'); 
        $fecha = date("Y-m-d");
        $objeto->registrarBase($base,$fecha,$tipoB);
        header('Location: recargas.php');
   }

   if(isset($_POST['guardarRecar'])){
        $nombre = $_POST['nombre'];
        $dinero = $_POST['dinero'];
        $tipoConcep = $_POST['tipoConcep'];
        $objeto->registrarConcepto($nombre,$dinero,$tipoConcep);
          $objeto->totalDiaRecargas();
       // header('Location: recargas.php');
   }

   if(isset($_POST['okMinu'])){
       $base = $_POST['base'];
       $tipoB = $_POST['tipoBase'];
       date_default_timezone_set('America/Bogota');
       $fecha = date("Y-m-d");
       $objeto->registrarBase($base,$fecha,$tipoB);
       header('Location: minutos.php');
   }

   if(isset($_POST['guardarMinu'])){
        $nombre = $_POST['nombre'];
        $dinero = $_POST['dinero'];
        $tipoConcep = $_POST['tipoConcep'];
           $objeto->registrarConcepto($nombre,$dinero,$tipoConcep);
           $objeto->totalDiaMinutos();
        //header('Location: minutos.php');
   }

   if(isset($_POST['okVitri'])){
       $base = $_POST['base'];
       $tipoB = $_POST['tipoBase'];
       date_default_timezone_set('America/Bogota');
       $fecha = date("Y-m-d");
       $objeto->registrarBase($base,$fecha,$tipoB);
       header('Location: vitrina.php');
   }

   if(isset($_POST['guardarVitri'])){
       $nombre = $_POST['nombre'];
       $dinero = $_POST['dinero'];
       $tipoConcep = $_POST['tipoConcep'];
       $objeto->registrarConcepto($nombre,$dinero,$tipoConcep);
       $objeto->totalDiaVitrina();
      //header('Location: vitrina.php');
   }

   if(isset($_POST['enviar'])){
       $tipo = $_POST['tipo'];
       $fecha = $_POST['fecha'];
       $objeto->buscarReporte($tipo,$fecha);
       //header('Location: reporte.php');
   }

   if(isset($_POST['editConcepto'])){
      $cod = $_POST['id_registro'];
      $nombre = $_POST['nombre'];
      $dinero = $_POST['dinero'];
      if($objeto->modificarConcepto($cod,$nombre,$dinero)){
              //$objeto->buscarReporteConcepto();
               $objeto->refres();
      }
   }

   if(isset($_POST['notas'])){
      $nota = $_POST['nota'];
      $objeto->actualizarNota($nota);
      $objeto->verNota();
   }

   if(isset($_POST['registrarPrecio'])){
      $nom = $_POST['nombre'];
      $pre = $_POST['dinero'];
      $objeto->registrarPrecio($nom,$pre);
      $objeto->verPrecios();
   }

   if(isset($_POST['editPrecio'])){
      $nom = $_POST['nombre'];
      $pre = $_POST['dinero'];
      $cod = $_POST['id_registro'];
      if($objeto->modificarPrecio($cod,$nom,$pre)){
         $objeto->verPrecios();
      }
   }

   if(isset($_POST['calcular'])){
      $fecha1 = $_POST['fecha1'];
      $fecha2 = $_POST['fecha2'];
      $tipo = $_POST['tipo'];
      if($objeto->calcularReporte($fecha1,$fecha2,$tipo)){

      }
   }

?>