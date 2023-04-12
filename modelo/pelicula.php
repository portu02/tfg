<?php
include_once("Crud.php");
class Pelicula extends Crud
{

    private $data = array();
    private $id_pelicula;
    private $nombre;
    private $imagen;
    private $sinopsis;
    private $duracion;
    private $url;
    private $clasificacion;
    private $categoria;
    private $fecha_estreno;

    private $conexion;
    const TABLA = "pelicula";


    public function __construct($id_pelicula, $nombre, $imagen, $sinopsis, $duracion, $url, $clasificacion, $categoria, $fecha_estreno)
    {
        $this->id_pelicula = $id_pelicula;
        $this->nombre = $nombre;
        $this->imagen = $imagen;
        $this->sinopsis = $sinopsis;
        $this->duracion = $duracion;
        $this->url = $url;
        $this->clasificacion = $clasificacion;
        $this->categoria = $categoria;
        $this->fecha_estreno = $fecha_estreno;

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
            $stmt = $this->conexion->prepare("INSERT INTO " . self::TABLA . "(id_pelicula, nombre, imagen, sinopsis, duracion, url, clasificacion, categoria, fecha_estreno) VALUES (:id_pelicula, :nombre, :imagen, :sinopsis, :duracion, :url, :clasificacion, :categoria, :fecha_estreno)");

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