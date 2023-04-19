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
            $stmt = $this->conexion->prepare("INSERT INTO " . self::TABLA . "(id_sala, descripcion, capacidad, habilitada, luxury, lleno) VALUES (:id_sala, :descripcion, :capacidad, :habilitada, :luxury, :lleno)");

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

    function actualizar()
    {
        try {
            $stmt = $this->conexion->prepare("UPDATE " . self::TABLA . " SET nombre=:nombre,imagen=:imagen,sinopsis=:sinopsis,duracion=:duracion,url=:url,clasificacion=:clasificacion,categoria=:categoria,fecha_estreno=:fecha_estreno WHERE id_pelicula=:id_pelicula;");

            $stmt->bindParam(":id_pelicula", $this->id_pelicula);
            $stmt->bindParam(":nombre", $this->nombre);
            $stmt->bindParam(":imagen", $this->imagen);
            $stmt->bindParam(":sinopsis", $this->sinopsis);
            $stmt->bindParam(":duracion", $this->duracion);
            $stmt->bindParam(":url", $this->url);
            $stmt->bindParam(":clasificacion", $this->clasificacion);
            $stmt->bindParam(":categoria", $this->categoria);
            $stmt->bindParam(":fecha_estreno", $this->fecha_estreno);

            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error" . $e->getMessage();
        }
    }
}