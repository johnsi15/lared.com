<?php
  class funciones{
     private $bd;

     function __construct(){
         require_once('config.php');
         $bd = new conexion();
         $bd->conectar();
     }

    public function login($user,$pass){
         session_start();
         $resultado = mysql_query("SELECT * FROM usuarios WHERE nombre='$user' AND clave='$pass'");
         $fila = mysql_fetch_array($resultado);
         if($fila>0){
         	$id_user=$fila['id'];
            $user = $fila['nombre'];
         	$_SESSION['id_user']=$id_user;
            $_SESSION['nombre'] = $user;
         	return true;
         }else{
         	return false;
         }
    }

    public function registrarBase($base,$fecha,$tipoB){
          date_default_timezone_set('America/Bogota');
          $fecha = date("Y-m-d");

          $resultado = mysql_query("INSERT INTO binternet (baseDia,fecha,tipoBase) VALUES ('$base','$fecha','$tipoB')") 
                       or die ("problemas en el inserte de base internet".mysql_error());
                       if($tipoB=='internet'){
                           mysql_query("UPDATE totalesdia SET base ='$base' WHERE tipo='internet' AND fecha='$fecha'") 
                                    or die ("Error en el update");
                       }else{
                         if($tipoB=='recarga'){
                              mysql_query("UPDATE totalesdia SET base ='$base' WHERE tipo='recarga' AND fecha='$fecha'") 
                                    or die ("Error en el update");
                         }else{
                            if($tipoB=='minutos'){
                                 mysql_query("UPDATE totalesdia SET base ='$base' WHERE tipo='minutos' AND fecha='$fecha'") 
                                    or die ("Error en el update");
                            }else{
                                if($tipoB=='vitrina'){
                                    mysql_query("UPDATE totalesdia SET base ='$base' WHERE tipo='vitrina' AND fecha='$fecha'") 
                                                 or die ("Error en el update");
                                }
                            }
                         }
                       }
          
    }

    public function registrarConcepto($nom,$dinero,$tipoCon){
         date_default_timezone_set('America/Bogota'); 
         $fecha = date("Y-m-d");
         $resultado = mysql_query("INSERT INTO cinternet (nombre,dinero,tipoConcepto,fecha) VALUES ('$nom','$dinero','$tipoCon','$fecha')")
                                      or die ("problemas con el insert de concepto de internet".mysql_error());
    }

    public function consultaInternet(){
        date_default_timezone_set('America/Bogota'); 
        $fecha = date("Y-m-d");
             
        $resultado = mysql_query("SELECT * FROM binternet WHERE fecha='$fecha' AND tipoBase='internet'");
        if($fila=mysql_fetch_array($resultado)){
                 if($fecha == $fila['fecha']){
                   $salida = '<h1> Base del dia es: $'.number_format($fila['baseDia']).' - Fecha: '.$fila['fecha'].'</h1>';           
                   echo $salida;
                   return true;
                }else{
                    $salida ="<h1> Base del Dia: $0 </h1>";
                    echo $salida;
                    return false;
                }
        }else{
            $salida ="<h1> Base del Dia: $0  del  ".$fecha." </h1>";
            echo $salida;
            return false;
        } 
    }

    public function consultaRecarga(){
        date_default_timezone_set('America/Bogota'); 
        $fecha = date("Y-m-d");
             
        $resultado = mysql_query("SELECT * FROM binternet WHERE fecha='$fecha' AND tipoBase='recarga'");
        if($fila=mysql_fetch_array($resultado)){
                 if($fecha == $fila['fecha']){
                   $salida = '<h1> Base del dia es: $'.number_format($fila['baseDia']).' - Fecha: '.$fila['fecha'].'</h1>';           
                   echo $salida;
                   return true;
                }else{
                    $salida ="<h1> Base del Dia: $0 </h1>";
                    echo $salida;
                    return false;
                }
        }else{
            $salida ="<h1> Base del Dia: $0  del ".$fecha." </h1>";
            echo $salida;
            return false;
        } 
    }

    public function consultaMinutos(){
        date_default_timezone_set('America/Bogota');
        $fecha = date("Y-m-d");

        $resultado = mysql_query("SELECT * FROM binternet WHERE fecha='$fecha' AND tipoBase='minutos'");
        if($fila = mysql_fetch_array($resultado)){
            if($fecha == $fila['fecha']){
                $salida = '<h1> Base del dia es: $'.number_format($fila['baseDia']).' - Fecha: '.$fila['fecha'].'</h1>';
                echo $salida;
                return true;
            }else{
                $salida = '<h1> Base del Dia: $0 </h1>';
                echo $salida;
                return false;
            }
        }else{
            $salida = '<h1> Base del Dia: $0  del  '.$fecha.'</h1>';
            echo $salida;
            return false;
        }
    }

    public function consultaVitrina(){
        date_default_timezone_set('America/Bogota');
        $fecha = date("Y-m-d");

        $resultado = mysql_query("SELECT * FROM binternet WHERE fecha='$fecha' AND tipoBase='vitrina'");
        if($fila = mysql_fetch_array($resultado)){
            if($fecha == $fila['fecha']){
                $salida = '<h1> Base del dia es: $'.number_format($fila['baseDia']).' - Fecha: '.$fila['fecha'].'</h1>';
                echo $salida;
                return true;
            }else{
                $salida = '<h1> Base del Dia: $0 </h1>';
                echo $salida;
                return false;
            }
        }else{
            $salida = '<h1> Base del Dia: $0  del  '.$fecha.'</h1>';
            echo $salida;
            return false;
        }
    }

    public function totalDiaInternet(){
        date_default_timezone_set('America/Bogota'); 
        $fecha = date("Y-m-d");
        $totalInternet=0;

        $resultado = mysql_query("SELECT sum(dinero) AS total FROM cinternet WHERE fecha='$fecha' AND tipoConcepto='internet'");
        //$base = mysql_query("SELECT baseDia FROM binternet WHERE fecha='$fecha' AND tipoBase='internet'");

        $fila = mysql_fetch_array($resultado);

        $totalInternet = $fila['total'];

        if($fila['total']!=0) {
            $salida = '<h3 class="well"> Total del Dia: $'.number_format($fila['total']).'</h3>';
            echo $salida;
        }else{
            $totalInternet=0;
            $salida = '<h3 class="well"> Total del Dia: $0</h3>';
            echo $salida;
        }

        $result = mysql_query("SELECT * FROM totalesdia WHERE fecha='$fecha' AND tipo='internet'");

        if($fila = mysql_fetch_array($result)){
            mysql_query("UPDATE totalesdia SET total ='$totalInternet' WHERE tipo='internet' AND fecha='$fecha'") 
                                    or die ("Error en el update");
        }else{
            $totalInternet=0;
            mysql_query("INSERT INTO totalesdia (total,base,tipo,fecha) VALUES ('$totalInternet','0','internet','$fecha')")
                                    or die ("problemas en insert de totales dia...");
        }   
    }

    public function totalDiaRecargas(){
        date_default_timezone_set('America/Bogota');
        $fecha = date("Y-m-d");
        $totalRecargas=0;

        $resultado = mysql_query("SELECT sum(dinero) AS total FROM cinternet WHERE fecha='$fecha' AND tipoConcepto='recarga'");
        $fila = mysql_fetch_array($resultado);

        $totalRecargas = $fila['total'];

        if($fila['total']!=0) {
            $salida = '<h3 class="well"> Total del Dia: $'.number_format($fila['total']).'</h3>';
            echo $salida;
        }else{
            $totalRecargas=0;
            $salida = '<h3 class="well"> Total del Dia: $0</h3>';
            echo $salida;
        }

        $result = mysql_query("SELECT * FROM totalesdia WHERE fecha='$fecha' AND tipo='recarga'");

        if($fila = mysql_fetch_array($result)){
            mysql_query("UPDATE totalesdia SET total ='$totalRecargas' WHERE tipo='recarga' AND fecha='$fecha'") 
                                    or die ("Error en el update");
        }else{
            $totalRecargas=0;
            mysql_query("INSERT INTO totalesdia (total,base,tipo,fecha) VALUES ('$totalRecargas','0','recarga','$fecha')")
                                    or die ("problemas en insert de totales dia...");
        }   
    }

    public function totalDiaMinutos(){
        date_default_timezone_set('America/Bogota');
        $fecha = date("Y-m-d");
        $totalMinutos=0;

        $resultado = mysql_query("SELECT sum(dinero) AS total FROM cinternet WHERE fecha='$fecha' AND tipoConcepto='minutos'");
        $fila = mysql_fetch_array($resultado);

        $totalMinutos = $fila['total'];

        if($fila['total']!=0){
            $salida = '<h3 class="well"> Total del Dia: $'.number_format($fila['total']).'</h3>';
            echo $salida;
        }else{
            $totalMinutos=0;
            $salida = '<h3 class="well"> Total del Dia: $0</h3>';
            echo $salida;
        }

        $result = mysql_query("SELECT * FROM totalesdia WHERE fecha='$fecha' AND tipo='minutos'");

        if($fila = mysql_fetch_array($result)){
            mysql_query("UPDATE totalesdia SET total ='$totalMinutos' WHERE tipo='minutos' AND fecha='$fecha'") 
                                    or die ("Error en el update");
                                   
        }else{
            $totalMinutos=0;
            mysql_query("INSERT INTO totalesdia (total,base,tipo,fecha) VALUES ('$totalMinutos','0','minutos','$fecha')")
                                    or die ("problemas en insert de totales dia porque...");
        }   
    }

    public function totalDiaVitrina(){
        date_default_timezone_set('America/Bogota');
        $fecha = date("Y-m-d");
        $totalVitrina=0;

        $resultado = mysql_query("SELECT sum(dinero) AS total FROM cinternet WHERE fecha='$fecha' AND tipoConcepto='vitrina'");
        $fila= mysql_fetch_array($resultado);

        $totalVitrina = $fila['total'];

        if($fila['total']!=0){
            $salida = '<h3 class="well"> Total del Dia: $'.number_format($fila['total']).'</h3>';
            echo $salida;
        }else{
            $totalVitrina=0;
            $salida = '<h3 class="well"> Total del Dia: $0</h3>';
            echo $salida;
        }

        $result = mysql_query("SELECT * FROM totalesdia WHERE fecha='$fecha' AND tipo='vitrina'");

        if($fila = mysql_fetch_array($result)){
            mysql_query("UPDATE totalesdia SET total ='$totalVitrina' WHERE tipo='vitrina' AND fecha='$fecha'") 
                                    or die ("Error en el update");
        }else{
            $totalVitrina=0;
            mysql_query("INSERT INTO totalesdia (total,base,tipo,fecha) VALUES ('$totalVitrina','0','vitrina','$fecha')")
                                    or die ("problemas en insert de totales dia...");
        }   
    }

    public function reporteDiario(){
        date_default_timezone_set('America/Bogota');
        $fecha = date("Y-m-d");

        $resultado = mysql_query("SELECT * FROM cinternet WHERE fecha='$fecha'");

        $sumaInternet=0;  $sumaRecarga=0; $sumaMinutos=0; $sumaVitrina=0;

        while($fila = mysql_fetch_array($resultado)){
            if($fila['tipoConcepto'] == 'internet'){
                 $sumaInternet = $sumaInternet+$fila['dinero'];
            }else{
                if($fila['tipoConcepto'] == 'recarga'){
                    $sumaRecarga = $sumaRecarga+$fila['dinero'];
                }else{
                    if($fila['tipoConcepto'] == 'minutos'){
                        $sumaMinutos = $sumaMinutos+$fila['dinero'];
                    }else{
                        if($fila['tipoConcepto'] == 'vitrina'){
                            $sumaVitrina = $sumaVitrina+$fila['dinero'];
                        }
                    }
                }
            }
        }
         
        $salida ='<tr> 
                        <td> $'.number_format($sumaInternet).'</td>
                        <td> $'.number_format($sumaRecarga).'</td>
                        <td> $'.number_format($sumaMinutos).'</td>
                        <td> $'.number_format($sumaVitrina).'</td>
                  </tr>';
         echo $salida;
    }

    public function reporteDiarioBase(){///TENER EN CUENTA NO TIENE RELACION HACER ALGO AL RESPECTO. y el select no debe de ir asi por si acaso...
        date_default_timezone_set('America/Bogota');
        $fecha = date("Y-m-d");

        $resultado = mysql_query("SELECT * FROM cinternet,binternet WHERE cinternet.tipoConcepto=binternet.tipoBase AND cinternet.fecha='$fecha' AND binternet.fecha='$fecha'");
        
        $sumaInternet=0;  $sumaRecarga=0; $sumaMinutos=0; $sumaVitrina=0;
        $baseInternet=0;  $baseRecarga=0; $baseMInutos=0; $baseVitrina=0;

        while($fila = mysql_fetch_array($resultado)){
            if($fila['tipoConcepto'] == 'internet'){
                 $baseInternet = $fila['baseDia'];
                 $sumaInternet = $sumaInternet+$fila['dinero'];
            }else{
                if($fila['tipoConcepto'] == 'recarga'){
                    $baseRecarga = $fila['baseDia'];
                    $sumaRecarga = $sumaRecarga+$fila['dinero'];
                }else{
                    if($fila['tipoConcepto'] == 'minutos'){
                        $baseMInutos = $fila['baseDia'];
                        $sumaMinutos = $sumaMinutos+$fila['dinero'];
                    }else{
                        if($fila['tipoConcepto'] == 'vitrina'){
                            $baseVitrina = $fila['baseDia'];
                            $sumaVitrina = $sumaVitrina+$fila['dinero'];
                        }
                    }
                }
            }
        }

        $totalInternet = $sumaInternet + $baseInternet;
        $totalRecargas = $sumaRecarga + $baseRecarga;
        $totalMinutos =  $sumaMinutos + $baseMInutos;
        $totalVitrina =  $sumaVitrina + $baseVitrina;

        $salida ='<tr> 
                        <td> $'.number_format($totalInternet).'</td>
                        <td> $'.number_format($totalRecargas).'</td>
                        <td> $'.number_format($totalMinutos).'</td>
                        <td> $'.number_format($totalVitrina).'</td>
                  </tr>';
         echo $salida;
    }

    public function reporteBases(){
        date_default_timezone_set('America/Bogota');
        $fecha = date("Y-m-d");

        $resultado = mysql_query("SELECT * FROM binternet WHERE fecha='$fecha'");

        $baseInternet=0; $baseRecarga=0; $baseMinutos=0; $baseVitrina=0;

        while($fila = mysql_fetch_array($resultado)){
            if($fila['tipoBase'] == 'internet'){
                $baseInternet = $fila['baseDia'];
            }else{
                if($fila['tipoBase'] == 'recarga'){
                    $baseRecarga = $fila['baseDia'];
                }else{
                    if($fila['tipoBase'] == 'minutos'){
                        $baseMinutos = $fila['baseDia'];
                    }else{
                        if($fila['tipoBase'] == 'vitrina'){
                            $baseVitrina = $fila['baseDia'];
                        }
                    }
                }
            } 
        }

        $salida = '<tr> 
                       <td> $'.number_format($baseInternet).'</td>
                       <td> $'.number_format($baseRecarga).'</td>
                       <td> $'.number_format($baseMinutos).'</td>
                       <td> $'.number_format($baseVitrina).'</td>
                  </tr>';
        echo $salida;
    }

    public function buscarReporte($tipo,$fecha){
        if($fecha=='0001-01-01'){
            $resultado = mysql_query("SELECT * FROM totalesdia ORDER BY fecha DESC ")
                                        or die ("problemas en el select ".mysql_error());
        }else{
            $resultado = mysql_query("SELECT * FROM totalesdia WHERE tipo='$tipo' AND fecha='$fecha'")
                                        or die ("problemas en el select ".mysql_error());

           // $result = mysql_query("SELECT * FROM binternet WHERE tipoBase='$tipo' AND fecha='$fecha'");
        }

        while($fila = mysql_fetch_array($resultado)){
               $salida ='<tr> 
                        <td> $'.number_format($fila['base']).'</td>
                        <td> $'.number_format($fila['total']).'</td>
                        <td> '.$fila['tipo'].'</td>
                        <td> '.$fila['fecha'].'</td>
                  </tr>';
               echo $salida;
        }
    }
    
    //BUSCAMOS LOS REPORTES DIARIOS ESTAN PAGINADOS DE 10 DATOS POR PAGINA.
    public function buscarReporteInicio(){///TENER EN CUENTA SI SE PIERDEN LOS DATOS O SALEN DONDE NO SON....
            $cant_reg = 10;//definimos la cantidad de datos que deseamos tenes por pagina.

            if(isset($_GET["pagina"])){
                $num_pag = $_GET["pagina"];//numero de la pagina
            }else{
                $num_pag = 1;
            }

            if(!$num_pag){//preguntamos si hay algun valor en $num_pag.
                $inicio = 0;
                $num_pag = 1;
            }else{//se activara si la variable $num_pag ha resivido un valor oasea se encuentra en la pagina 2 o ha si susecivamente 
                $inicio = ($num_pag-1)*$cant_reg;//si la pagina seleccionada es la numero 2 entonces 2-1 es = 1 por 10 = 10 empiesa a contar desde la 10 para la pagina 2 ok.
            }

            $resultado = mysql_query("SELECT * FROM totalesdia ORDER BY fecha DESC LIMIT $inicio,$cant_reg")
                                            or die ("problemas en el select ".mysql_error());

            while($fila = mysql_fetch_array($resultado)){
                    //$fila = mysql_fetch_array($resultado);
                   $salida ='<tr> 
                            <td> $'.number_format($fila['base']).'</td>
                            <td> $'.number_format($fila['total']).'</td>
                            <td> '.$fila['tipo'].'</td>
                            <td> '.$fila['fecha'].'</td>
                      </tr>';
                   echo $salida;
            }
    }

    //BUSCAR DATOS POR CONCEPTO Y DATOS PAGINADOS DE 30 
    public function buscarReporteConcepto(){
            $cant_reg = 30;//definimos la cantidad de datos que deseamos tenes por pagina.

            if(isset($_GET["pagina"])){
                $num_pag = $_GET["pagina"];//numero de la pagina
            }else{
                $num_pag = 1;
            }

            if(!$num_pag){//preguntamos si hay algun valor en $num_pag.
                $inicio = 0;
                $num_pag = 1;
            }else{//se activara si la variable $num_pag ha resivido un valor oasea se encuentra en la pagina 2 o ha si susecivamente 
                $inicio = ($num_pag-1)*$cant_reg;//si la pagina seleccionada es la numero 2 entonces 2-1 es = 1 por 10 = 10 empiesa a contar desde la 10 para la pagina 2 ok.
            }

            $resultado = mysql_query("SELECT * FROM cinternet ORDER BY tipoConcepto,fecha DESC LIMIT $inicio,$cant_reg");//obtenemos los datos ordenados limitado con la variable inicio hasta la variable cant_reg
        
            while($fila = mysql_fetch_array($resultado)){
                echo '<tr> 
                             <td>'.$fila['nombre'].'</td>
                             <td>'.$fila['dinero'].'</td>
                             <td>'.$fila['tipoConcepto'].'</td>
                             <td>'.$fila['fecha'].'</td>
                             <td><a id="edit" class="btn btn-mini btn-info" href="'.$fila['id'].'"><strong>Editar</strong></a></td>
                           </tr>';
                          // echo $salida;
            }      
    }
    
    //ESTA ES LA PAGINACION DE LOS DATOS DE REPORTE POR CONCEPTO..
    public function paginacion(){
            $cant_reg = 30;//definimos la cantidad de datos que deseamos tenes por pagina.

            if(isset($_GET["pagina"])){
                $num_pag = $_GET["pagina"];//numero de la pagina
            }else{
                $num_pag = 1;
            }

            if(!$num_pag){//preguntamos si hay algun valor en $num_pag.
                $inicio = 0;
                $num_pag = 1;

            }else{//se activara si la variable $num_pag ha resivido un valor oasea se encuentra en la pagina 2 o ha si susecivamente 
                $inicio = ($num_pag-1)*$cant_reg;//si la pagina seleccionada es la numero 2 entonces 2-1 es = 1 por 10 = 10 empiesa a contar desde la 10 para la pagina 2 ok.
            }

            $result = mysql_query("SELECT * FROM cinternet");///hacemos una consulta de todos los datos de cinternet
           
            $total_registros=mysql_num_rows($result);//obtenesmos el numero de datos que nos devuelve la consulta

            $total_paginas = ceil($total_registros/$cant_reg);

            echo '<div class="pagination">
                    ';
            if(($num_pag-1)>0){//preguntamos que si el numero de la pagina es mayor a cero ejemplo pagina 1-1 = 0 es > 0 no oasea que no hay paginas anteriores a esta ok.
                echo "<ul><li> <a href='reporteConcepto.php?pagina=".($num_pag-1)."'> Prev </a></li></ul>";//mandamos el link de anterior si es el caso.
                echo "<ul><li> <a href='reporteConcepto.php?pagina=1'> ... </a></li></ul>";//mandamos el link de anterior si es el caso.
            }
            for($i=1; $i<=$total_paginas; $i++){//vamos listando todas las paginas.
                if($num_pag==$i){//preguntamos si el numero de la pagina es = a la variable $i para imprimirla pero desabilitada.
                     echo "<ul> <li class='disabled'><a href='#'>".$num_pag."</a></li></ul>";
                     $_SESSION['paginaActual']=$num_pag;
                     $_SESSION['numPagina'] = $i;
                }else{ //si no imprimimos el numero de la pagina siguiente. 
                    if($i<=12){
                        if($num_pag>=12){
                        }else{
                               echo "<ul> <li> <a  href='reporteConcepto.php?pagina=$i'> $i </a></li></ul>";
                        }
                    }else{
                        if($num_pag>=12){
                            echo "<ul> <li> <a  href='reporteConcepto.php?pagina=$i'> $i </a></li></ul>";
                        }
                    }
                }
            }
            if($num_pag<12){
                       echo "<ul> <li> <a  href='reporteConcepto.php?pagina=13'>...</a></li></ul>";
            }
            if(($num_pag+1)<=$total_paginas){//preguntamos si el numero de la pagina es menor o = al total de paginas para que aparesca el siguiente
                
                echo "<ul><li> <a href='reporteConcepto.php?pagina=".($num_pag+1)."'> Next </a></li></ul>";
            } ;'
                   </div>';
    }

    //ESTA ES LA PAGINACION DE LOS REPORTES DIARIOS OK NO CONFUNDIR CON REPORTES POR CONCEPTO.
    public function paginacionReporte(){
            $cant_reg = 10;//definimos la cantidad de datos que deseamos tenes por pagina.

            if(isset($_GET["pagina"])){
                $num_pag = $_GET["pagina"];//numero de la pagina
            }else{
                $num_pag = 1;
            }

            if(!$num_pag){//preguntamos si hay algun valor en $num_pag.
                $inicio = 0;
                $num_pag = 1;

            }else{//se activara si la variable $num_pag ha resivido un valor oasea se encuentra en la pagina 2 o ha si susecivamente 
                $inicio = ($num_pag-1)*$cant_reg;//si la pagina seleccionada es la numero 2 entonces 2-1 es = 1 por 10 = 10 empiesa a contar desde la 10 para la pagina 2 ok.
            }

            $result = mysql_query("SELECT * FROM totalesdia");///hacemos una consulta de todos los datos de cinternet
           
            $total_registros=mysql_num_rows($result);//obtenesmos el numero de datos que nos devuelve la consulta

            $total_paginas = ceil($total_registros/$cant_reg);
            echo '<div class="pagination">
                    ';
            if(($num_pag-1)>0){//preguntamos que si el numero de la pagina es mayor a cero ejemplo pagina 1-1 = 0 es > 0 no oasea que no hay paginas anteriores a esta ok.
                echo "<ul><li> <a href='reporte.php?pagina=".($num_pag-1)."'> Prev </a></li></ul>";//mandamos el link de anterior si es el caso.
                echo "<ul><li> <a href='reporte.php?pagina=1'> ... </a></li></ul>";//mandamos el link de anterior si es el caso.
            }
            for($i=1; $i<=$total_paginas; $i++){//vamos listando todas las paginas.
                if($num_pag==$i){//preguntamos si el numero de la pagina es = a la variable $i para imprimirla pero desabilitada.
                     echo "<ul> <li class='disabled'><a href='#'>".$num_pag."</a></li></ul>";
                    // $_SESSION['paginaActual']=$num_pag;
                }else{ //si no imprimimos el numero de la pagina siguiente. 
                   if($i<=10){
                        if($num_pag>=10){
                        }else{
                               echo "<ul> <li> <a  href='reporte.php?pagina=$i'> $i </a></li></ul>";
                        }
                    }else{
                        if($num_pag>=10){
                            echo "<ul> <li> <a  href='reporte.php?pagina=$i'> $i </a></li></ul>";
                        }
                    }
                }
            }
            if(($num_pag+1)<=$total_paginas){//preguntamos si el numero de la pagina es menor o = al total de paginas para que aparesca el siguiente
                echo "<ul><li> <a href='reporte.php?pagina=".($num_pag+1)."'> Next </a></li></ul>";
            } ;'
                   </div>';
    }
    
    //REFRES CUANDO EDITAMOS UN DATO SE REFRESQUE LOS DATOS MODIFICADOS.
    public function refres(){
            $cant_reg = 30;//definimos la cantidad de datos que deseamos tenes por pagina.

            session_start();//iniciamos session para poder estrael los datos de la variable session ok.

            if(isset($_SESSION['paginaActual'])){///veridicaos si existe la variable session paginaActual ok.
                  $inicio = ($_SESSION['paginaActual']-1)*$cant_reg; //sensillo pagina actula ejemplo 12-1 = 11 * 30 = 330. entonces inicia desdel 330 hasta el 30 osea 30 registro.
            }
            $resultado = mysql_query("SELECT * FROM cinternet ORDER BY tipoConcepto,fecha DESC LIMIT $inicio,$cant_reg");//obtenemos los datos ordenados limitado con la variable inicio hasta la variable cant_reg
           
            while($fila = mysql_fetch_array($resultado)){
                    echo '<tr> 
                             <td>'.$fila['nombre'].'</td>
                             <td>'.$fila['dinero'].'</td>
                             <td>'.$fila['tipoConcepto'].'</td>
                             <td>'.$fila['fecha'].'</td>
                             <td><a id="edit" class="btn btn-mini btn-info" href="'.$fila['id'].'"><strong>Editar</strong></a></td>
                           </tr>';
                          // echo $salida;
            }      
    }
    
    //METODO PARA ACTUALIZAR LOS DATOS AL MODIFICAR...
    public function modificarConcepto($cod,$nombre,$dinero){
        $result = mysql_query("UPDATE cinternet SET nombre='$nombre', dinero='$dinero' WHERE id='$cod'");
        if($result){
            return true;
            echo "Bien";
        }else{
            return false;
            echo "Error";
        }
    }

    public function actualizarNota($nota){
        $resultado = mysql_query("SELECT id FROM notas");

        if($fila = mysql_fetch_row($resultado)){
            mysql_query("UPDATE notas SET nota ='$nota' WHERE id='1'") 
                             or die ("Error en el update");
        }else{
            mysql_query("INSERT INTO notas (nota) VALUES ('$nota')") 
                       or die ("problemas en el inserte de Notas....".mysql_error());
        }
        

    }

    public function verNota(){
        $resultado = mysql_query("SELECT nota FROM notas");
        $fila = mysql_fetch_array($resultado);
        echo $fila['nota'];
    }


  }//cierre de la clase
?>