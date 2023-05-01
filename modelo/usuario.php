<?php
include_once("Crud.php");
class Usuario extends Crud
{
    private $data = array();
    private $conexion;
    private $id_usuario;
    private $nombre;
    private $apellido1;
    private $apellido2;
    private $nombre_usuario;
    private $correo;
    private $contrasena;
    private $rol;
    const TABLA = "usuario";

    public function __construct($id_usuario, $nombre, $apellido1, $apellido2, $nombre_usuario, $correo, $contrasena, $rol)
    {
        $this->id_usuario = $id_usuario;
        $this->nombre = $nombre;
        $this->apellido1 = $apellido1;
        $this->apellido2 = $apellido2;
        $this->nombre_usuario = $nombre_usuario;
        $this->correo = $correo;
        $this->contrasena = $contrasena;
        $this->rol = $rol;

        parent::__construct(self::TABLA);
        $this->conexion = parent::conex();
    }

    public function __set($property, $value)
    {
        $this->data[$property] = $value;
    }

    public function __get($property)
    {
        if (array_key_exists($property, $this->data)) {
            return $this->data[$property];
        }
    }

    function crear()
    {
        try {
            $stmt = $this->conexion->prepare("INSERT INTO " . self::TABLA . "(nombre, apellido1, apellido2, nombre_usuario, correo, contrasena, rol) VALUES (:nombre, :apellido1, :apellido2, :nombre_usuario, :correo, :contrasena, :rol)");

            $stmt->bindParam(":nombre", $this->nombre);
            $stmt->bindParam(":apellido1", $this->apellido1);
            $stmt->bindParam(":apellido2", $this->apellido2);
            $stmt->bindParam(":nombre_usuario", $this->nombre_usuario);
            $stmt->bindParam(":correo", $this->correo);
            $stmt->bindParam(":contrasena", $this->contrasena);
            $stmt->bindParam(":rol", $this->rol);

            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error" . $e->getMessage();
        }
    }

    function actualizar()
    {
        try {
            $stmt = $this->conexion->prepare("UPDATE " . self::TABLA . " SET nombre =: nombre,apellido1 =: apellido1,apellido2 =: apellido2, nombre_usuario =: nombre_usuario, rol =: rol WHERE id_usuario =: id_usuario;");

            $stmt->bindParam(":nombre", $this->nombre);
            $stmt->bindParam(":apellido1", $this->apellido1);
            $stmt->bindParam(":apellido2", $this->apellido2);
            $stmt->bindParam(":nombre_usuario", $this->nombre_usuario);
            $stmt->bindParam(":rol", $this->rol);
            $stmt->bindParam(":id_usuario", $this->id_usuario);

            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error" . $e->getMessage();
        }
    }
}
