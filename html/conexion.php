<!DOCTYPE html>
<html  >
<head>
  <meta charset="UTF-8">
  <title>Registro</title>
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

                $rfc=$_POST['rfc'];
                $cp=$_POST['cp'];
                $razon=$_POST['razon'];
                $telefono=$_POST['telefono'];
                $calle=$_POST['calle'];
                $colonia=$_POST['colonia'];
                $int=$_POST['int'];
                $ext=$_POST['ext'];
                $nombre=$_POST['Nombre'];
                $correo=$_POST['correo'];

               
                if (!$rfc || !$cp  || !$telefono || !$calle || !$colonia || !$int || !$ext || !$nombre || !$correo){
                  echo "Tus datos están incompletos, revisa tu formulario.";
                }else{
                   if(strlen($rfc) > 13){
                    echo "El rfc que se ingresó en el formulario no es de un tamaño correcto, checa que el rfc sea de un tamaño máximo de 13 caracteres";
                  }else{
                $conexion=pg_connect("host=localhost port=5432 dbname=GHOSTPAPER user=postgres password=");
                if(!$conexion){
                echo "Error";
                }else{
                  $comprobar=pg_query($conexion,"select rfc from cliente where exists(select 1 from cliente where rfc='$rfc');");
                  echo "<br>";
                if($comprobar){
                if(!$razon){

                          $sql = pg_query($conexion,"set client_min_messages ='Error';
                                                    INSERT INTO Cliente (rfc,razon_soc,cp,colonia,calle,num_exterior, num_interior,nombre)
                                                                          VALUES ('$rfc','null','$cp','$colonia','$calle','$ext','$int','$nombre');

                                                    INSERT INTO CORREO(rfc,correo)
                                                                          VALUES ('$rfc','$correo');

                                                    INSERT INTO TELEFONO_CLIENTE(rfc,telefono)
                                                                          VALUES ('$rfc','$telefono');
                                                    select * from cliente where rfc='$rfc';
                                                    ;");}


                else{ 
                          $sql = pg_query($conexion,"set client_min_messages ='Error';
                                                    INSERT INTO Cliente (rfc,razon_soc,cp,colonia,calle,num_exterior, num_interior,nombre)
                                                                          VALUES ('$rfc','$razon','$cp','$colonia','$calle','$ext','$int','$nombre');

                                                    INSERT INTO CORREO(rfc,correo)
                                                                          VALUES ('$rfc','$correo');

                                                    INSERT INTO TELEFONO_CLIENTE(rfc,telefono)
                                                                          VALUES ('$rfc','$telefono');
                                                    select * from cliente where rfc='$rfc';
                                                    ");}

                      
                        echo " Bienvenid@ <br><br>";
                        while( $obj = pg_fetch_row($sql)){
                               echo $obj[5] ;
                               echo "<br><br>";
                               echo " Te has registrado correctamente";
                             }}else{

                              echo "Datos incorrectos o incompletos en el formulario. Favor de verificar los datos.";
                             }}}}
                ?>
               </h1> 
            </div>
        </div>
    </div>
   
</section>
