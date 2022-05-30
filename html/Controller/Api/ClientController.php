<?php
class ClientController extends BaseController
{
    /**
     * "/client/list" Endpoint - Get list of clients
     */
    public function listAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $arrQueryStringParams = $this->getQueryStringParams();
 
        if (strtoupper($requestMethod) == 'GET') {
            try {
                $clientModel = new ClientModel();
                echo "Hola";
                $curp = $arrQueryStringParams['curp'];
                $arrClients = $clientModel->client_data($curp);
                $responseData = json_encode($arrClients);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        }
        else if (strtoupper($requestMethod) == 'POST') {
            try {
                $clientModel = new ClientModel();
                //foreach($_POST as $key=>$value)
                //{
                //    echo "$key=$value";
                //    echo "\n";
                //}
                $direccion = $_POST["calle"].",".$_POST["numero"].",".$_POST["colonia"].",".$_POST["cp"].",".$_POST["estado"];

                if ($_POST["Motherlastname"] == "")
                    $motherName = null;
                else
                    $motherName = $_POST["Motherlastname"];

                echo "variables\n ";
                echo $_POST["firstname"]." ".$_POST["Parentlastname"]." ".$motherName." ".$_POST["CURP"]." ".$_POST["email"]." ".$_POST["genero"]." ".$_POST["telefono"]." ".$direccion; 

                $arrClients = $clientModel->create_client($_POST["firstname"],$_POST["Parentlastname"],$motherName,$_POST["CURP"],$_POST["email"],$_POST["genero"], $_POST["telefono"], $direccion);
                //$responseData = json_encode($arrClients);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
            header('Location: /redirecting.html');
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