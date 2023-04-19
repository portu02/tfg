<?php
include_once("CRUD.php");
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
            $stmt = $this->conexion->prepare("SELECT * FROM " . self::TABLA . " WHERE id_pelicula = :id;");

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
}
?>