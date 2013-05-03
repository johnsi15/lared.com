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
        $objeto->actualizarBase($fecha,$base,$tipoB);
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
        $objeto->actualizarBase($fecha,$base,$tipoB);
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
       $objeto->actualizarBase($fecha,$base,$tipoB);
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
       $objeto->actualizarBase($fecha,$base,$tipoB);
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

   if(isset($_POST['guardarVitrinaMenu'])){
       $nombre = $_POST['nombre'];
       $dinero = $_POST['dinero'];
       $tipoConcep = $_POST['tipoConcep'];
       $objeto->registrarConcepto($nombre,$dinero,$tipoConcep);
       $objeto->reporteDiario();
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
            $objeto->paginacion();
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

   if(isset($_POST['cierre'])){
       date_default_timezone_set('America/Bogota');
       $fecha = date("Y-m-d");
       $dia = date("l");
       if($dia=="Monday"){
       $dia = "Lunes";
       }else if($dia=="Tuesday"){
       $dia = "Martes";
       }else if($dia=="Wednesday"){
       $dia = "Miercoles";
       }else if($dia=="Thursday"){
       $dia = "Jueves";
       }else if($dia=="Friday"){
       $dia = "Viernes";
       }else if($dia=="Saturday"){
       $dia = "Sabado";
       }else if($dia=="Sunday"){
       $dia = "Domingo";
       }
      $dinero = $_POST['dinero'];
      $fecha = $_POST['fecha'];
     // $dia = $_POST['dia'];
      $objeto->cierreDia($fecha,$dinero,$dia);
       $objeto->verCierres();
   }

   if(isset($_POST['editCierre'])){
       $dia = $_POST['dia'];
       $dinero = $_POST['dinero'];
       $cod = $_POST['id_registro'];

       if($objeto->modificarCierre($dia,$dinero,$cod)){
          //$objeto->refresCierre();
          $objeto->paginacionCierre();
          $objeto->verCierres();
       }
   }

   if(isset($_POST['calcularCierre'])){
      $fecha1 = $_POST['fecha1'];
      $fecha2 = $_POST['fecha2'];
      $objeto->calcularCierre($fecha1,$fecha2);
   }

   if(isset($_POST['gasto'])){
      $gasto = $_POST['dinero'];
      $tgasto = $_POST['tipoGasto'];
      date_default_timezone_set('America/Bogota');
      $fecha = date("Y-m-d");
      $objeto->gastos($gasto,$tgasto,$fecha);
      $objeto->verGastos();
   }

   if(isset($_POST['editGasto'])){
     $gasto = $_POST['dinero'];
     $tgasto = $_POST['tipoGasto'];
     $cod = $_POST['id_registro'];
     if($objeto->modificarGasto($gasto,$tgasto,$cod)){
         $objeto->paginacionGastos();
         $objeto->verGastos();
     }
   }

   if(isset($_POST['calcularGasto'])){
      $fecha1 = $_POST['fecha1'];
      $fecha2 = $_POST['fecha2'];
      $objeto->calcularGasto($fecha1,$fecha2);
   }
    /*buscador en tiempo real......*/
   if(isset($_POST['query'])){
       $palabra = $_POST['query'];
       $objeto->buscarConcepto($palabra);
   }

   /*___________________________________________*/
   //Eliminar
   if(isset($_POST['deleteConcepto'])){
      $cod = $_POST['id_delete'];
      $objeto->deleteConcepto($cod);
      $objeto->paginacion();
      $objeto->buscarReporteConcepto();
   }

   if(isset($_POST['deletePrecio'])){
      $cod = $_POST['id_delete'];
      $objeto->deletePrecio($cod);
      $objeto->verPrecios();
   }

   if(isset($_POST['deleteCierre'])){
      $cod = $_POST['id_delete'];
      $objeto->deleteCierre($cod);
      $objeto->paginacionCierre();
      $objeto->verCierres();
   }

?>