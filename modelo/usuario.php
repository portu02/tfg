<?php
include_once("Crud.php");
class Usuario extends Crud
{
    private $data = array();
    private $conexion;
    private $id_usuario;
    private $nombre;
    private $apellido;
    private $correo;
    private $contrasena;
    private $rol;
    const TABLA = "usuario";

    public function __construct($id_usuario, $nombre, $apellido,  $correo, $contrasena, $rol)
    {
        $this->id_usuario = $id_usuario;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
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
    public function getcorreo(){
        return $this->correo;
    }
    public function getcontra(){
        return $this->contrasena;
    }
    public function setcontra($a){
        $this->contrasena=$a;
    }


    function crear()
    {
        try {
            $stmt = $this->conexion->prepare("INSERT INTO " . self::TABLA . "(nombre, apellido,  correo, contrasena, rol) VALUES (:nombre, :apellido,:correo, :contrasena, :rol)");

            $stmt->bindParam(":nombre", $this->nombre);
            $stmt->bindParam(":apellido", $this->apellido);
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
            $stmt = $this->conexion->prepare("UPDATE " . self::TABLA . " SET nombre =:nombre,apellido =:apellido, correo =:correo, rol =:rol WHERE id_usuario =:id_usuario;");

            $stmt->bindParam(":nombre", $this->nombre);
            $stmt->bindParam(":apellido", $this->apellido);
            $stmt->bindParam(":correo", $this->correo);
            $stmt->bindParam(":rol", $this->rol);
            $stmt->bindParam(":id_usuario", $this->id_usuario);

            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error" . $e->getMessage();
        }
    }
    function comprueba($contra,$correo){
        $prueba=False;
        try{
            $stmt = $this->conexion->prepare("SELECT * FROM ". self::TABLA ." WHERE correo = '".$this->correo."'");
            $stmt->execute();
            $resultados=$stmt->fetchAll();
            if(count($resultados)>0){
                $contra_base=$resultados[0]['contrasena'];
                if(password_verify($this->contrasena,$contra_base)){
                    $prueba=True;
                }
            }
        }catch(PDOException $e){
            echo "Error" . $e->getMessage();
        }
        return $prueba;
    }
}
