<?php
require_once PROJECT_ROOT_PATH . "/Model/Database.php";
 
class ProductModel extends Database
{
    public function getProductos()
    {
        return $this->select("SELECT * FROM juegos ORDER BY nombreJuego");
    }
}