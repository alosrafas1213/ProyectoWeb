<?php
class VentaController extends BaseController
{
    /**
     * "/venta/list" Endpoint - Get list of ventas
     */
    public function listAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $arrQueryStringParams = $this->getQueryStringParams();
 
        if (strtoupper($requestMethod) == 'GET') {
            try {
                $ventaModel = new VentaModel();
                $curp = $arrQueryStringParams['curp'];
                $arrVentas = $ventaModel->venta_data($curp);
                $responseData = json_encode($arrVentas);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        }
        else if (strtoupper($requestMethod) == 'POST') {
            try {
                $ventaModel = new VentaModel();
                $cantidad = [];
                $pedidos = [];
                foreach($_POST as $key=>$value)
                {
                    //echo "$key=$value"."\n";
                    if(substr($key,0,1)=='c')
                        $cantidad[substr($key,1,2)]=$value;
                }

                foreach($cantidad as $key=>$value)
                {
                    if ($_POST[$key]=="on")
                        $pedidos[$key]=$value;
                }

                foreach($pedidos as $key=>$value)
                {
                    //echo "$key=$value"."\n";
                }

                $arrVentas = $ventaModel->ventas($pedidos, $_POST['CURP']);
                //$responseData = json_encode($arrVentas);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
            header('Location: /redirecting2.html');
            exit;
        }
        else {
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
        // send output
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
                array('Content-Type: application/json', $strErrorHeader)
            );
        }

    }
}
?>