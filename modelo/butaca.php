<?php
include_once("Crud.php");
class Butaca extends Crud
{
    private $data = array();
    private $conexion;
    private $id_butaca;
    private $columna;
    private $fila;
    private $color;
    private $id_sala;
    const TABLA = "butaca";

    public function __construct($id_butaca, $columna, $fila, $color, $id_sala)
    {
        $this->id_butaca = $id_butaca;
        $this->columna = $columna;
        $this->fila = $fila;
        $this->color = $color;
        $this->id_sala = $id_sala;

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
            $stmtsacarmax = $this->conexion->prepare("SELECT MAX(id_butaca) AS max_id FROM butaca");
            $stmtsacarmax->execute();
            $sacarid = $stmtsacarmax->fetch(PDO::FETCH_ASSOC);

            $id_butaca = $sacarid['max_id'] + 1;

            $stmt = $this->conexion->prepare("INSERT INTO " . self::TABLA . "(id_butaca,columna, fila, color, id_sala) VALUES (:id_butaca,:columna, :fila, :color, :id_sala)");

            $stmt->bindParam(":id_butaca", $id_butaca);
            $stmt->bindParam(":columna", $this->columna);
            $stmt->bindParam(":fila", $this->fila);
            $stmt->bindParam(":color", $this->color);
            $stmt->bindParam(":id_sala", $this->id_sala);

            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error" . $e->getMessage();
        }
    }

    function actualizar()
    {
        try {
            $stmt = $this->conexion->prepare("UPDATE " . self::TABLA . " SET columna =: columna,fila =: fila,color =: color,id_sala =: id_sala WHERE id_sala =: id_butaca;");

            $stmt->bindParam(":columna", $this->columna);
            $stmt->bindParam(":fila", $this->fila);
            $stmt->bindParam(":color", $this->color);
            $stmt->bindParam(":id_sala", $this->id_sala);
            $stmt->bindParam(":id_butaca", $this->id_butaca);

            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error" . $e->getMessage();
        }
    }

    function sacar_max()
    {
        try {
            $stmt = $this->conexion->prepare("SELECT * FROM " . self::TABLA . " INNER JOIN butaca ON sala.id_sala=butaca.id_sala ORDER BY fila DESC ,columna DESC");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error" . $e->getMessage();
        }
    }

    function obtieneDeIDSala($id)
    {
        try {
            $stmt = $this->conexion->prepare("SELECT * FROM " . self::TABLA . " WHERE id_sala LIKE :id ORDER BY fila DESC ,columna ASC;");

            $stmt->bindParam(":id", $id);

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function cambiarColor()
    {
        try {
            $stmt = $this->conexion->prepare("UPDATE " . self::TABLA . " SET color = :color WHERE columna = :columna AND fila = :fila AND id_sala = :id_sala;");

            $stmt->bindParam(":columna", $this->columna);
            $stmt->bindParam(":fila", $this->fila);
            $stmt->bindParam(":color", $this->color);
            $stmt->bindParam(":id_sala", $this->id_sala);

            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function obtenerIDButaca($fila, $columna, $id_sala)
    {
        try {
            $stmt = $this->conexion->prepare("SELECT id_butaca FROM " . self::TABLA . " WHERE butaca.fila = :fila AND butaca.columna = :columna AND butaca.id_sala = :id_sala;");

            $stmt->bindParam(":fila", $fila);
            $stmt->bindParam(":columna", $columna);
            $stmt->bindParam(":id_sala", $id_sala);

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function ComprobarID($id)
    {
        try {
            $stmt = $this->conexion->prepare("SELECT * FROM " . self::TABLA . " WHERE id_butaca LIKE :id;");

            $stmt->bindParam(":id", $id);

            $stmt->execute();

            $resultado = $stmt->fetchObject();
            if ($resultado) {
                return $resultado;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
