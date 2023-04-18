<?php
class Conexion
{
    private $servidor = "localhost";
    private $usuario = "root";
    private $clave = "";
    private $dbname = "cine";

    function conex()
    {
        try {
            return new PDO("mysql:host=$this->servidor;dbname=$this->dbname;charset=utf8", $this->usuario, $this->clave);
        } catch (PDOException $e) {
            return "Error" . $e->getMessage();
        }
    }
}