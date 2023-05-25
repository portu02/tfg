<?php
include_once("Crud.php");
class Comentario extends Crud
{
    private $data = array();
    private $conexion;
    private $id_comentario;
    private $id_usuario;
    private $id_pelicula;
    private $texto;
    const TABLA = "comentario";

    public function __construct($id_comentario,$id_pelicula,$id_usuario, $texto)
    {
        $this->id_comentario = $id_comentario;
        $this->id_pelicula = $id_pelicula;
        $this->id_usuario = $id_usuario;
        $this->texto = $texto;

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
            $stmt = $this->conexion->prepare("INSERT INTO " . self::TABLA . "(id_pelicula, id_usuario, texto) VALUES (:id_pelicula, :id_usuario, :texto);");

            $stmt->bindParam(":id_pelicula", $this->id_pelicula);
            $stmt->bindParam(":id_usuario", $this->id_usuario);
            $stmt->bindParam(":texto", $this->texto);

            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error" . $e->getMessage();
        }
    }

    function actualizar()
    {

    }

    public function obtieneDeIDPelicula($id_pelicula)
    {
        try {
            $stmt = $this->conexion->prepare("SELECT comentario.id_usuario as id_usuario, usuario.nombre as nombre, comentario.id_pelicula as id_pelicula, comentario.texto as texto FROM comentario INNER JOIN usuario ON (comentario.id_usuario = usuario.id_usuario) WHERE id_pelicula = :id_pelicula ORDER BY comentario.id_comentario;");
            
            $stmt->bindParam(":id_pelicula", $id_pelicula);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
             
        } catch (PDOException $e) {
            return "Error" . $e->getMessage();
        }
    }

}
