<?php
require_once PROJECT_ROOT_PATH . "/Model/Database.php";
 
class ClientModel extends Database
{
    public function create_client($firstName, $Parentlastname, $Motherlastname, $CURP, $email, $genero, $telefono, $direccion)
    {
        return $this->insert("INSERT INTO usuario (curp, nombreUsuario, apPaterno, apMaterno, genero, telefono, direccion, email) VALUES(?, ?, ?, ?, ?, ?, ?, ?)"
        , ['ssssssss', $CURP, $firstName, $Parentlastname, $Motherlastname, $genero, $telefono, $direccion, $email]);
    }

    public function client_data($curp)
    {
        return $this->select("SELECT * FROM usuario WHERE curp=?", ['s',$curp]);
    }
}