<html>
<head>
<link rel="stylesheet" href="stilosSitio.css" type="text/css" >
</head>
<body>
<h1>Procesando pedido</h1>
<?php

$numCliente = $_POST[numCliente];
$codProducto    = $_POST[codProducto];
echo "<h2>Recibimos su Pedido</h2>";
echo "Cliente= $numCliente CodigoProducto= $codProducto";
echo "<br>";
echo "<br>";

$servername = "172.30.195.219";
$username = "tiendaDba";
$password = "123456";
$database = "tienda";

// Create connection
$db_cnx = new mysqli($servername, $username, $password, $database);

// Check connection
if ($db_cnx->connect_error) {
  die("Connection failed: " . $db_cnx->connect_error);
}

echo $db_cnx->host_info . "<br>";

echo "conectado a DB" . "<br>" ;

$numPedido = 200;

/* Prepared statement */
$stmt = $db_cnx->prepare("INSERT INTO pedidos(numPedidos, codProd, numCliente) VALUES (?, ?, ?)");
echo "wokrs";
/* Bind and execute */
$id = 1;
$label = 'PHP';
$stmt->bind_param("isi", $numPedido, $codProducto, $numCliente); // "is" means that $id is bound as an integer and $label as a string

$stmt->execute();

//echo "insCmd = $sql_cmd <br>";	

//$rslt = mysql_query($sql_cmd);
//echo "InsRslt = $rslt " . mysql_error() ."<br>";

//$sql_cmd = "select * from pedidos ; # where numcliente = " . $numCliente;
$selCmd = $db_cnx->query("SELECT * FROM pedidos");
echo "selCmd = $sql_cmd <br>";		

//$rslt_set = mysql_query($sql_cmd);
echo "Rows= " . $db_cnx->affected_rows. "<br>";
$nRows = $db_cnx->affected_rows;
$n = 1;

while ($n <= $nRows)
  { echo "row # " . $n;
    $fila = $selCmd->fetch_array(MYSQLI_NUM);
	echo " Datos=" . $fila[0] . " - " . $fila[1] . " - " . $fila[2] . "<br>" ; 
    $n++;
  }

echo "<h3>Gracias por su pedido</h3>";
?>
</body>
</html>