<!DOCTYPE html>
<html  >
<head>
  <meta charset="UTF-8">
  <title>Ingresar</title>
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
                echo"<br><br><br>";
                if (isset($_GET["PostData1"]) && isset($_GET["PostData2"])) {
                // asignar w1 y w2 a dos variables
                $carrito = $_GET["PostData1"];
                $total = $_GET["PostData2"];}
                if(!$total){
                  echo"Tu carrito está vacío.";

                }else{

                  if (isset($_GET["rfc"])) {
                      // asignar w1 y w2 a dos variables
                  $rfc=$_GET['rfc'];
                  $nombre=$_GET['nombre'];
                  $dir=$_GET['direccion'];
                  $concep=$_GET['concepto'];
                  $factura=$_GET['factura'];
                  $envio=0;
                  }
                  $noVenta=null;
                  
                
                  if(!$rfc or !$nombre or!$dir){
                    echo "La información del formulario de compra está incompleta o incorrecta.<br> La compra no se pudo realizar. <br>  Favor de verificar el contenido del formulario de compra.";
                  }else{

                $conexion=pg_connect("host=localhost port=5432 dbname=GHOSTPAPER user=postgres password=");
                if(!$conexion){
                echo "Error";
                }else{
                     $comprobar=pg_query($conexion,"select rfc from cliente where exists(select 1 from cliente where rfc='$rfc');");
                     $comprobar=pg_fetch_row($comprobar);
                     
                     if(!$comprobar){
                      echo "No existe el cliente con el ",$rfc,", ingresado en el formulario de compra. <br> Favor de verificar la compra o registrarse en el apartado 'cliente' de la página.";
                    }else{
                       
                        
                        
                            if($envio!=1){
                              if($dir){
                               $dir = pg_query($conexion,"select CONCAT('C.P: ',C.cp,',colonia: ',C.colonia,',calle:',C.calle,' número exterior: ',C.num_exterior,' número interior: ',
                                                              C.num_interior,' ciudad: ',E.estado) AS lala from cliente C, estado E WHERE rfc=('$rfc') limit 1;");
                               $val=pg_fetch_assoc($dir);
                              } else{
                              echo "La información del formulario de compra es incompleta o incorrecta.<br> La compra no se pudo realizar. <br>  Favor de verificar el contenido del formulario de compra.";
                              }
                            }
                               $carrito=",".$carrito.",";
                               for ($i = 1; $i <= 21; $i++) {
                                    $patron="/,$i,/";
                                    $cantidad=preg_match($patron, $carrito);
                                    
                                    if($cantidad != 0){
                                    $precio_cantidad=pg_query($conexion,"select precio*$cantidad from producto where codigo=$i;");
                                    $precio_cantidad=pg_fetch_row($precio_cantidad);
                                   
                                    if($noVenta== null){
                                    $noVenta = pg_query($conexion,"select public.compra_cantidad_('$concep','$total','$rfc','$i','$precio_cantidad[0]','$cantidad','$val[lala]');");
                                    $noVenta=pg_fetch_array($noVenta);
                                   
                                    }else{
                                        $sql=pg_query($conexion,"Insert into consta values('$i','$noVenta[0]','$precio_cantidad[0]','$cantidad');");
                                      }
                                    }
                                  }
                              echo "<h1>Tu compra ha sido realizada ¡Muchas gracias por tu preferencia!<br> Vuelve pronto ",$nombre,"<br><br><h1> Información de tu compra: <br><h3> Venta: <br>";
                              
                            
                              if($factura==true){
                                $info = pg_query($conexion,"select *,TO_CHAR(fecha_venta,'DD.MM.YYYY') as fecha from venta where (noventa='$noVenta[0]');");
                                while( $obj2 = pg_fetch_row($info)){
                                  echo" Número de venta --->";
                                  echo "VENTA-00",$obj2[0] ;
                                  echo"<br> IVA aplicado --->";
                                  echo $obj2[1] ;
                                  echo"% <br> concepto --->' ";
                                  echo $obj2[2] ;
                                  echo"'<br> precio total --->";
                                  echo $obj2[3] ;
                                  echo" <br>fecha --->";
                                  echo $obj2[7] ;
                                  echo"<br> dirección de envío--->";
                                  echo $val['lala'] ;
                                  echo "<br>----------------------------------------------------------------------<br>";
                                  echo "<h1> Factura: <h3>";
                                  $info_fac = pg_query($conexion,"select c.nombre, c.rfc, v.noventa, v.precio_total, v.fecha_venta, 
                                                                  CONCAT(C.cp,',colonia: ',C.colonia,',calle: ',C.calle,', número exterior: ',C.num_exterior,', número interior: ',
                                                                  C.num_interior,', ciudad: ',E.estado)
                                                                  as direc, c.razon_soc from cliente C, estado E, venta v WHERE c.rfc='$rfc' and v.noventa='$noVenta[0]' limit 1;");
                                  while( $obj3 = pg_fetch_row($info_fac)){
                                  echo" Nombre completo --->";
                                  echo $obj3[0] ;
                                  echo"<br> RFC del cliente --->";
                                  echo $obj3[1] ;
                                  echo"<br> Razon social --->' ";
                                  echo $obj3[6] ;
                                  echo" ' <br> dirección del cliente ---> ";
                                  echo "CP: ",$obj3[5];
                                  echo"<br>  Número de venta --->";
                                  echo "VENTA-00",$obj2[0] ;
                                  echo"'<br> precio total --->";
                                  echo $obj2[3] ;
                                  echo" <br>fecha --->";
                                  echo $obj2[7] ;
                                  echo"<br> dirección de envío--->";
                                  echo $val['lala'];
                                  echo "<br>----------------------------------------------------------------------<br>";
                                  echo "<h2> Productos comprados: <h3>";
                                    $info_product_final = pg_query($conexion,"select p.modelo,p.precio,p.marca,p.nombre from producto p where codigo=any(select codigo_fk from consta where noventa_fk='$noVenta[0]');");
                                    $cantidada_producto=pg_query($conexion,"select cantidad from consta where noventa_fk='$noVenta[0]';");
                                    while ($obj5 = pg_fetch_row($info_product_final) and $obj4=pg_fetch_row($cantidada_producto)) {

                                        echo" Nombre del producto --->";
                                        echo $obj5[3] ;
                                        echo"<br> Marca --->";
                                        echo $obj5[2] ;
                                        echo"<br> Modelo --->";
                                        echo $obj5[0] ;
                                        echo"<br> Precio ---> ";
                                        echo $obj3[1] ;
                                        echo" , Cantidad ---> ";
                                        echo $obj4[0];
                                        
                                        echo "<br>----------------------------------------------------------------------<br>";
                                    }
                                
                                  } 
                                } 
                              }
                                else{
                                  echo "<br> No se solicitó factura.<br>";
                                  $info = pg_query($conexion,"select *,TO_CHAR(fecha_venta,'DD.MM.YYYY') as fecha from venta where (noventa='$noVenta[0]');");
                                 while( $obj2 = pg_fetch_row($info)){
                                  echo"Número de venta --->";
                                  echo "VENTA-00",$obj2[0] ;
                                  echo"<br> IVA aplicado --->";
                                  echo $obj2[1] ;
                                  echo" % <br>concepto --->' ";
                                  echo $obj2[2] ;
                                  echo"' <br> precio total --->";
                                  echo $obj2[3] ;
                                  echo" <br>fecha --->";
                                  echo $obj2[7] ;
                                  echo" <br>dirección --->";
                                  echo $val['lala'];
                                  echo "<br>----------------------------------------------------------------------<br>";
                                }
                              }
                            }
                        
                      }
                    }
                }
                ?>
               </h1> 
            </div>
        </div>
    </div>
   
</section>
