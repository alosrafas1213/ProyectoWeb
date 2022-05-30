<?php
require_once PROJECT_ROOT_PATH . "/Model/Database.php";
 
class VentaModel extends Database
{
    public function ventas($pedidos, $curp){

        $precios = $this->select("SELECT idJuego, precio from juegos");
        $sumaPrecios = 0;
        $cantidad = 0;
        foreach ($pedidos as $key=>$value){
            $sumaPrecios+=$precios[$key-1]['precio']*$value;
            $cantidad+=$value;
        }
        //echo $sumaPrecios."\n";
        //echo $cantidad."\n";

        $this->insert2("INSERT INTO ventas (curp, cantidad, costoTotal) values (?,?,?)",['sid',$curp, $cantidad, $sumaPrecios]);
    }

    public function venta_data($curp)
    {
        return $this->select("select idVenta, curp, cantidad, ROUND(costoTotal,2) as costoTotal from ventas v where curp = ?", ['s',$curp]);
    }
}