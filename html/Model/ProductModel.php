<?php
require_once PROJECT_ROOT_PATH . "/Model/Database.php";
 
class ProductModel extends Database
{
    public function getProductos()
    {
        return $this->select("SELECT * FROM juegos ORDER BY nombreJuego");
    }

    public function buyProductos($idJuego, $cantidad, $curp){

        $precios = $this->select("SELECT idJuego, precio from juegos");

        echo $precios;

        //$this->insert3("INSERT INTO ventas  (curp, idProductoVenta) values (?,?)");
    }
}