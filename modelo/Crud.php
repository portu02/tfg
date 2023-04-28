<?php
include("conexion.php");
abstract class Crud extends Conexion
{
    private $tabla;
    private $conexion;

    public function __construct($tabla)
    {
        $this->tabla = $tabla;
        $this->conexion = parent::conex();
    }

    public function obtieneTodos()
    {
        try {
            $stmt = $this->conexion->prepare("SELECT * FROM $this->tabla");
            
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
             
        } catch (PDOException $e) {
            return "Error" . $e->getMessage();
        }
    }

    public function obtieneDeID($id)
    {
        try {
            $stmt = $this->conexion->prepare("SELECT * FROM $this->tabla WHERE id_$this->tabla LIKE :id;");

            $stmt->bindParam(":id", $id);

            $stmt->execute();

            return $stmt->fetchObject();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    
    public function obtieneUltimoID()
    {
        $stmt = $this->conexion->prepare("SELECT MAX(id_$this->tabla) AS last_id FROM $this->tabla");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int) $row['last_id'];
    }

    public function borrar($id)
    {
        if (!empty($this->obtieneDeID($id))) {

            try {
                $stmt = $this->conexion->prepare("DELETE FROM $this->tabla WHERE id_$this->tabla LIKE :id;");

                $stmt->bindParam(":id", $id);

                $stmt->execute();
            } catch (PDOException $e) {
                echo "Error" . $e->getMessage();
            }
        }
    }

    abstract public function crear();
    abstract public function actualizar();
}
