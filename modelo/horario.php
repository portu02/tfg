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
            $stmt = $this->conexion->prepare("SELECT * FROM " . self::TABLA . " WHERE id_pelicula = :id AND fecha >= :hoy AND CAST(CONCAT(fecha, ' ', hora) AS DATETIME) >= NOW();");
            $stmt->bindParam(":hoy", $fecha_hoy);
            $stmt->bindParam(":id", $id);

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function obtenerIDSala($id,$dia,$hora){
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

    public function obtenerIDHorario($id_pelicula,$id_sala,$dia,$hora){
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
}
?>