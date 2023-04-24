<?php
include_once("conexion.php");
class Paginacion extends Conexion
{
    private $pagactual;
    private $numresultados;
    private $resultadoporpag;
    private $indice;
    private $totalpag;
    private $conexion;
    private $tabla;

    function __construct($resultadoporpag, $tabla)
    {
        $this->tabla = $tabla;
        $this->conexion = parent::conex();

        $this->resultadoporpag = $resultadoporpag;
        $this->indice = 0;
        $this->pagactual = 1;
        $this->conexion = parent::conex();
        $this->calcularPag();
    }

    function calcularPag()
    {
        $stmt = $this->conexion->prepare("SELECT COUNT(*) as total FROM $this->tabla");

        $stmt->execute();

        $this->numresultados = $stmt->fetch(PDO::FETCH_OBJ)->total;


        $this->totalpag = $this->numresultados / $this->resultadoporpag;
        
        if (isset($_GET['pagina'])) {
            //COMPROBAR SI ES VALIDA LA PAGINA
            if (is_numeric($_GET['pagina'])) {
                $this->pagactual = $_GET['pagina'];
            } else {
                $this->pagactual = 1;
            }
            $this->indice = ($this->pagactual - 1) * ($this->resultadoporpag);
        }
    }

    function mostrar()
    {
        try {

            $stmt = $this->conexion->prepare("SELECT DISTINCT pelicula.id_pelicula AS id_pelicula, pelicula.nombre	AS nombre,pelicula.imagen AS imagen,pelicula.sinopsis AS sinopsis,pelicula.duracion AS duracion,	pelicula.url AS	url,pelicula.clasificacion AS clasificacion,pelicula.categoria AS categoria,pelicula.fecha_estreno AS fecha_estreno FROM horario INNER JOIN pelicula ON (horario.id_pelicula = pelicula.id_pelicula) ORDER BY fecha_estreno DESC LIMIT $this->indice, $this->resultadoporpag ");

            $stmt->execute();
            $registroarray = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $registroarray;
        } catch (PDOException $e) {
            echo "Error" . $e->getMessage();
        }
    }

    function numeritos()
    {

        $array = array();
        for ($i = 0; $i < $this->totalpag; $i++) {
            $array[] = $i + 1;
        }

        return $array;
    }
}
?>