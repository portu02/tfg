<?php
include_once("Crud.php");
class Reserva extends Crud
{
    private $data = array();
    private $id_reserva;
    private $id_horario;
    private $id_usuario;
    private $id_sala;
    private $id_butaca;
    private $precio;

    private $conexion;
    const TABLA = "reserva";


    public function __construct($id_reserva, $id_horario, $id_usuario, $id_sala, $id_butaca, $precio)
    {
        $this->id_reserva = $id_reserva;
        $this->id_horario = $id_horario;
        $this->id_usuario = $id_usuario;
        $this->id_sala = $id_sala;
        $this->id_butaca = $id_butaca;
        $this->precio = $precio;

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
            $stmt = $this->conexion->prepare("INSERT INTO " . self::TABLA . "(id_horario,id_usuario,id_sala,id_butaca,precio) VALUES (:id_horario,:id_usuario,:id_sala,:id_butaca,:precio)");

            $stmt->bindParam(":id_horario", $this->id_horario);
            $stmt->bindParam(":id_usuario", $this->id_usuario);
            $stmt->bindParam(":id_sala", $this->id_sala);
            $stmt->bindParam(":id_butaca", $this->id_butaca);
            $stmt->bindParam(":precio", $this->precio);

            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error" . $e->getMessage();
        }
    }

    function actualizar()
    {
    }

    function reservadas($id_horario,$id_sala)
    {
        try {
            $stmt = $this->conexion->prepare("SELECT butaca.fila, butaca.columna FROM butaca INNER JOIN reserva ON reserva.id_butaca = butaca.id_butaca WHERE reserva.id_horario = :id_horario AND reserva.id_sala = :id_sala;");

            $stmt->bindParam(":id_horario", $id_horario);
            $stmt->bindParam(":id_sala", $id_sala);

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function ComprobarReserva($id_horario,$id_butaca)
    {
        try {
            $stmt = $this->conexion->prepare("SELECT * FROM reserva WHERE id_horario = :id_horario AND id_butaca = :id_butaca;");

            $stmt->bindParam(":id_horario", $id_horario);
            $stmt->bindParam(":id_butaca", $id_butaca);

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
