<!DOCTYPE html>
<html  >
<head>
  <meta charset="UTF-8">
  <title>Datos</title>
<link rel="stylesheet" href="assets/web/assets/mobirise-icons2/mobirise2.css">
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="preload" href="https://fonts.googleapis.com/css?family=Anton:400&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anton:400&display=swap"></noscript>
  <link rel="preload" href="https://fonts.googleapis.com/css?family=Noto+Sans+TC:100,300,400,500,700,900&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans+TC:100,300,400,500,700,900&display=swap"></noscript>
  <link rel="preload" href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,200,300,400,500,600,700,800,900&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,200,300,400,500,600,700,800,900&display=swap"></noscript>
  <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
</head>
<body>
    <section class="menu cid-skA6f9YY1i" once="menu" id="menu1-3">

    

    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="menu-logo">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="index.html">
                         <img src="assets/images/300px-68-olympic-emblem-166x144.png" alt="Mobirise" title="" style="height: 3.8rem;">
                    </a>
                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-white display-1" href="index.html">México 68</a></span>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true"><li class="nav-item"><a class="nav-link link text-white display-7" href="https://mobirise.co" aria-expanded="false">
                        </a></li><li class="nav-item"><a class="nav-link link text-white display-7" href="https://mobirise.co">
                        </a></li><li class="nav-item"><a class="nav-link link text-white display-7" href="https://mobirise.co">
                        </a></li><li class="nav-item"><a class="nav-link link text-white display-7" href="page4.html">
                        </a></li><li class="nav-item">
                    <a class="nav-link link text-white text-primary display-7" href="page1.html" aria-expanded="false"><span class="mbri-edit2 mbr-iconfont mbr-iconfont-btn">&nbsp; Productos</span>
                        </a>
                </li><li class="nav-item"><a class="nav-link link text-white text-primary display-7" href="page5.html" aria-expanded="false"><span class="mobi-mbri mobi-mbri-user-2 mbr-iconfont mbr-iconfont-btn">&nbsp;Cuenta</span>
                        </a></li><li class="nav-item"><a class="nav-link link text-white display-7" href="page4.html"><span class="mbri-file mbr-iconfont mbr-iconfont-btn">&nbsp;Registrarse</span>
                        </a></li><li class="nav-item"><a class="nav-link link text-white display-7" href="page3.html"><span class="mbri-change-style mbr-iconfont mbr-iconfont-btn">&nbsp;Conocenos</span>
                        </a></li><li class="nav-item"><a class="nav-link link text-white display-7" href="page1.html#header2-14"><span class="mbri-shopping-cart mbr-iconfont mbr-iconfont-btn">&nbsp;Carrito</span>
                        </a></li></ul>
            
        </div>
    </nav>
</section>



    

    <div class="mbr-overlay" style="opacity: 0; background-color: rgb(35, 35, 35);"></div>

    <div class="container align-center">
        <div class="row justify-content-md-center">
            <div class="mbr-black col-md-10">
              <p class="mbr-text pb-3 mbr-fonts-style display-5">
                <?php 

                $rfc2=$_POST['rfc2'];

                  echo"<br><br><br>";
                  $conexion=pg_connect("host=localhost port=5432 dbname=GHOSTPAPER user=postgres password=");
                if(!$conexion){
                echo "Error";
                }else{
                  $comprobar2=pg_query($conexion,"select rfc from cliente where exists(select 1 from cliente where rfc='$rfc2');");
                if($comprobar2){
               
                          $sql = pg_query($conexion,"select rfc from venta where exists(select 1 from venta where rfc='$rfc2');");
                      
                        echo "Datos del registro<br>";
                        if(!$sql){
                          echo "No has realizado compras ¡¿Qué esperas?!";
                        }else{
                          $count= pg_query($conexion,"select count(noventa) from Venta where rfc='$rfc2';");
                        while( $obj = pg_fetch_row($count)){
                                echo"Has realizado ";
                               echo $obj[0] ;
                               echo " compras en esta tienda.<br>";
                               $sql3 = pg_query($conexion,"select * from cliente where (rfc='$rfc2');");
                                 while( $obj3 = pg_fetch_row($sql3)){
                                  echo"¡Muchas gracias por tu preferencia!<br><br> Tu información: <br>";
                                  echo"<br> Tu RFC --->";
                                  echo $obj3[0] ;
                                  echo"<br>  Tu nombre --->";
                                  echo $obj3[5] ;
                                  echo"<br>  Tu razon soc --->";
                                  echo $obj3[1] ;
                                  echo"<br>  Tu dirección  --->";
                                  echo " CP: ", $obj3[2]," , colonia: ",$obj3[3]," , calle: ",$obj3[4]," , número Exterior: ",$obj3[6]," , número Interior: ",$obj3[7]," <br>" ;
                                  echo "----------------------------------------------------------------------<br> Tus compras: <br>";
                                }
                                $sql2 = pg_query($conexion,"select *,TO_CHAR(fecha_venta,'DD.MM.YYYY') as fecha from venta where (rfc='$rfc2');");
                                 while( $obj2 = pg_fetch_row($sql2)){
                                  echo"Número de venta --->";
                                  echo $obj2[0] ;
                                  echo" , IVA aplicado --->";
                                  echo $obj2[1] ;
                                  echo" % , concepto --->";
                                  echo $obj2[2] ;
                                  echo" , precio total --->";
                                  echo $obj2[3] ;
                                  echo" , fecha --->";
                                  echo $obj2[7] ;
                                  echo" , dirección --->";
                                  echo $obj2[6] ;
                                  echo "<br>----------------------------------------------------------------------<br>";
                                }
                             }
                        }
                        
                }else{

                              echo "No existe un registro del cliente con el RFC ' ";
                              echo $rfc2 ;
                              echo " '. Favor de verificar los datos.";
                             }
                           }
                ?>
               </h1> 
            </div>
        </div>
    </div>
   
</section>
