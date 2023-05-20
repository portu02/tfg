<?php
include_once("Crud.php");
class Horario extends Crud
{

    private $data = array();
    private $id_horario;
    private $fecha;
    private $hora;
    private $precio;
    private $id_pelicula;
    private $id_sala;

    private $conexion;
    const TABLA = "horario";

    public function __construct($id_horario, $fecha, $hora, $precio, $id_pelicula, $id_sala)
    {
        $this->id_horario = $id_horario;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->precio = $precio;
        $this->id_pelicula = $id_pelicula;
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
    }

    function actualizar()
    {
    }

    public function obtieneDeIDPelicula($id)
    {
        try {
            $fecha_hoy = date("Y-m-d");
            $stmt = $this->conexion->prepare("SELECT * FROM " . self::TABLA . " WHERE id_pelicula = :id AND fecha >= :hoy AND CAST(CONCAT(fecha, ' ', hora) AS DATETIME) >= NOW() ORDER BY fecha,hora;");
            $stmt->bindParam(":hoy", $fecha_hoy);
            $stmt->bindParam(":id", $id);

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function obtenerIDSala($id, $dia, $hora)
    {
        try {
            $stmt = $this->conexion->prepare("SELECT id_sala FROM " . self::TABLA . " WHERE hora LIKE :hora '%' AND fecha LIKE '%' :dia AND id_pelicula = :id;");

            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":dia", $dia);
            $stmt->bindParam(":hora", $hora);

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function obtenerIDHorario($id_pelicula, $id_sala, $dia, $hora)
    {
        try {
            $stmt = $this->conexion->prepare("SELECT id_horario FROM " . self::TABLA . " WHERE hora LIKE :hora '%' AND fecha LIKE '%' :dia AND id_pelicula = :id_pelicula AND id_sala = :id_sala;");

            $stmt->bindParam(":id_pelicula", $id_pelicula);
            $stmt->bindParam(":id_sala", $id_sala);
            $stmt->bindParam(":dia", $dia);
            $stmt->bindParam(":hora", $hora);

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    /* PARA CREAR EL crear_horario.php */
    public function sacarArrayDias()
    {
        try {
            $defaultValue = ["Sin días disponibles"];

            $stmt = $this->conexion->prepare("SELECT fecha FROM horario GROUP BY fecha");

            $stmt->execute();
            $horarioarray = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $arraydia = array();
            if (count($horarioarray) > 0) {
                foreach ($horarioarray as $a) {
                    $arraydia[] = $a["fecha"];
                }

                return $arraydia;
            } else {
                return $defaultValue;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function comprobarSiExistenHorarios($fecha_insertada)
    {
        try {
            $fecha_s = $fecha_insertada;
            $stmt = $this->conexion->prepare("SELECT fecha FROM horario WHERE fecha >= :fecha GROUP BY fecha;");
            $stmt->bindParam(":fecha", $fecha_s);
            $stmt->execute();
            $fecha_array = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($fecha_array) > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function comprobarSiExisteHorario($fecha_insertada)
    {
        try {
            $fecha_s = $fecha_insertada;
            $stmt = $this->conexion->prepare("SELECT fecha FROM horario WHERE fecha = :fecha GROUP BY fecha;");
            $stmt->bindParam(":fecha", $fecha_s);
            $stmt->execute();
            $fecha_array = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($fecha_array) > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function comprobarSiExistenHorariosEliminar($fecha_insertada)
    {
        /* ELIMINAR SI EXISTEN HORARIOS NO ELIMINA RESERVADAS */
        try {
            $fecha_s = $fecha_insertada;

            $stmt = $this->conexion->prepare("DELETE FROM horario WHERE fecha >= :fecha AND id_horario NOT IN (SELECT id_horario FROM reserva)");

            $stmt->bindParam(":fecha", $fecha_s);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function eliminarHorariosAntiguos()
    {
        try {
            $fecha_anteayer = new DateTime();
            $fecha_anteayer->modify('-2 day');
            $fecha_antigua = $fecha_anteayer->format('Y-m-d');

            $stmt = $this->conexion->prepare("DELETE FROM horario WHERE fecha <= :fecha;");

            $stmt->bindParam(":fecha", $fecha_antigua);
            $stmt->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function insertarHorario($hora, $ns, $fecha, $peliculaElegida)
    {
        try {
            $stmt = $this->conexion->prepare("SELECT * FROM horario WHERE fecha = :dia AND hora = :hora AND id_sala = :sala");
            $stmt->bindParam(":dia", $fecha);
            $stmt->bindParam(":hora", $hora);
            $stmt->bindParam(":sala", $ns);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            // Si no hay filas con los valores deseados, hacer la inserción
            if (!$resultado) {
                try {
                    $stmtsacarmax = $this->conexion->prepare("SELECT MAX(id_horario) AS max_id FROM horario");
                    $stmtsacarmax->execute();
                    $sacarid = $stmtsacarmax->fetch(PDO::FETCH_ASSOC);

                    $id_horario = $sacarid['max_id'] + 1;

                    $stmt = $this->conexion->prepare("INSERT INTO horario (id_horario,fecha, hora, id_pelicula, id_sala) VALUES (:id_horario,:dia,:hora,:pelicula,:sala)");

                    $sala = $ns;
                    $stmt->bindParam(":id_horario", $id_horario);
                    $stmt->bindParam(":dia", $fecha);
                    $stmt->bindParam(":hora", $hora);
                    $stmt->bindParam(":sala", $sala);
                    $stmt->bindParam(":pelicula", $peliculaElegida);
                    $stmt->execute();
                } catch (PDOException $e) {
                    echo "Error" . $e->getMessage();
                }
            }
        } catch (PDOException $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function comprobarSiLaPeliculaSeRepite($hora, $fecha, $peliculaElegida)
    {
        try {
            $stmtValidar = $this->conexion->prepare("SELECT * FROM horario WHERE fecha = :dia AND hora = :hora AND id_pelicula = :pelicula");

            $stmtValidar->bindParam(":dia", $fecha);
            $stmtValidar->bindParam(":hora", $hora);
            $stmtValidar->bindParam(":pelicula", $peliculaElegida);
            $stmtValidar->execute();

            if ($stmtValidar->fetch(PDO::FETCH_ASSOC)) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function ultimohorarios()
    {
        $stmt = $this->conexion->prepare("SELECT fecha FROM `horario` ORDER BY `horario`.`fecha` DESC LIMIT 1");
        $stmt->execute();
        $fecha_actual = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]["fecha"];
        $nueva_fecha = date('Y-m-d', strtotime($fecha_actual . ' +1 day'));
        return $nueva_fecha;
    }

    public function ComprobarID($id)
    {
        try {
            $stmt = $this->conexion->prepare("SELECT * FROM horario WHERE id_horario LIKE :id;");

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
