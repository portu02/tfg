<?php
include_once("Crud.php");
class Sala extends Crud
{
    private $data = array();
    private $id_sala;
    private $descripcion;
    private $capacidad;
    private $habilitada;
    private $luxury;
    private $lleno;

    private $conexion;
    const TABLA = "sala";


    public function __construct($id_sala, $descripcion, $capacidad, $habilitada, $luxury, $lleno)
    {
        $this->id_sala = $id_sala;
        $this->descripcion = $descripcion;
        $this->capacidad = $capacidad;
        $this->habilitada = $habilitada;
        $this->luxury = $luxury;
        $this->lleno = $lleno;

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
            $stmt = $this->conexion->prepare("INSERT INTO " . self::TABLA . "(descripcion, capacidad, habilitada, luxury, lleno) VALUES (:descripcion, :capacidad, :habilitada, :luxury, :lleno)");

            $stmt->bindParam(":descripcion", $this->descripcion);
            $stmt->bindParam(":capacidad", $this->capacidad);
            $stmt->bindParam(":habilitada", $this->habilitada);
            $stmt->bindParam(":luxury", $this->luxury);
            $stmt->bindParam(":lleno", $this->lleno);

            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error" . $e->getMessage();
        }
    }

    function actualizar()
    {
        try {
            $stmt = $this->conexion->prepare("UPDATE " . self::TABLA . " SET descripcion=:descripcion,capacidad=:capacidad,habilitada=:habilitada,luxury=:luxury,lleno=:lleno WHERE id_sala=:id_sala;");

            $stmt->bindParam(":id_sala", $this->id_sala);
            $stmt->bindParam(":descripcion", $this->descripcion);
            $stmt->bindParam(":capacidad", $this->capacidad);
            $stmt->bindParam(":habilitada", $this->habilitada);
            $stmt->bindParam(":luxury", $this->luxury);
            $stmt->bindParam(":lleno", $this->lleno);

            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error" . $e->getMessage();
        }
    }

    function sacarUltimoId(){
        try {
            $stmt = $this->conexion->prepare("SELECT id_sala FROM sala ORDER BY id_sala DESC LIMIT 1;");
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            $ultimoId = $resultado['id_sala'];
            return $ultimoId;
        } catch (PDOException $e) {
            echo "Error" . $e->getMessage();
        }
    }

    function actualizarCapacidad($numero, $ultimoId){
        try {
            $stmt = $this->conexion->prepare("UPDATE sala  SET capacidad = :capacidad WHERE id_sala = :id_sala");
            $stmt->bindParam(":capacidad", $numero);
            $stmt->bindParam(":id_sala", $ultimoId);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error" . $e->getMessage();
        }
    }
}