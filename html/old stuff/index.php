<link rel="stylesheet" type="text/css" href="pagina.css">
<link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@500&display=swap" rel="stylesheet">

<main id="main">
  <h1 id="title"> Los mejores juegos de mesa </h1>
  <br>
  <figure id="img-div">
        <img id="image" src="./ProyectoWEBImages/Ajedrez.jpg" />
    
    <figcaption id="img-caption"> Hola </figcaption>
    </figure>

  <?php
    $servername = "172.30.195.219";
    $username = "tiendaDb";
    $password = "123456";
    $database = "juegosMesa";

    // Create connection
    $db_cnx = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($db_cnx->connect_error) {
    die("Connection failed: " . $db_cnx->connect_error);
    }

    $query = "SELECT id, domain FROM services";
    $result = $db_cnx->query($query);
    $data = [];
    while ($row = $result->fetch_assoc()) {
      $data[$row['id']] = $row;
    }
  ?>



    <section id="tribute-info">
        <h3 id="headline">H</h3>
    <div class="table">
        <ul>
        <li><Strong>1915</strong> - </li>
        <li><Strong>1940</strong> - </li>
        <li><strong>1955</strong> - </li>
        </ul>
        <ul>
        <li>5 </li>
        <li>a</li>
        <li>k</li>
        </ul>
    </div>
    </section>
    <p>
        lol 
    </p>
</main>
