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
        if ($this->tabla == 'pelicula' || $this->tabla == 'pelicula_admin') {
            $stmt = $this->conexion->prepare("SELECT COUNT(DISTINCT pelicula.id_pelicula) as total FROM pelicula;");
        } elseif ($this->tabla == 'sala') {
            $stmt = $this->conexion->prepare("SELECT COUNT(DISTINCT sala.id_sala) as total FROM sala;");
        }elseif ($this->tabla == 'usuario') {
            $stmt = $this->conexion->prepare("SELECT COUNT(DISTINCT usuario.id_usuario) as total FROM usuario;");
        }elseif ($this->tabla == 'entradas') {
            $stmt = $this->conexion->prepare("SELECT COUNT(DISTINCT reserva.id_reserva) as total FROM reserva;");
        }

        $stmt->execute();

        $this->numresultados = $stmt->fetch(PDO::FETCH_OBJ)->total;


        $this->totalpag = $this->numresultados / $this->resultadoporpag;

        if ($this->tabla == 'pelicula') {
            if (isset($_GET['pagina'])) {
                //COMPROBAR SI ES VALIDA LA PAGINA
                if (is_numeric($_GET['pagina'])) {
                    $this->pagactual = $_GET['pagina'];
                } else {
                    $this->pagactual = 1;
                }
                $this->indice = ($this->pagactual - 1) * ($this->resultadoporpag);
            }
        } elseif ($this->tabla == 'sala') {
            if (isset($_GET['pagina_sala'])) {
                //COMPROBAR SI ES VALIDA LA PAGINA
                if (is_numeric($_GET['pagina_sala'])) {
                    $this->pagactual = $_GET['pagina_sala'];
                } else {
                    $this->pagactual = 1;
                }
                $this->indice = ($this->pagactual - 1) * ($this->resultadoporpag);
            }
        }  elseif ($this->tabla == 'pelicula_admin') {
            if (isset($_GET['pagina_pelicula'])) {
                //COMPROBAR SI ES VALIDA LA PAGINA
                if (is_numeric($_GET['pagina_pelicula'])) {
                    $this->pagactual = $_GET['pagina_pelicula'];
                } else {
                    $this->pagactual = 1;
                }
                $this->indice = ($this->pagactual - 1) * ($this->resultadoporpag);
            }
        }  elseif ($this->tabla == 'usuario') {
            if (isset($_GET['pagina_usuario'])) {
                //COMPROBAR SI ES VALIDA LA PAGINA
                if (is_numeric($_GET['pagina_usuario'])) {
                    $this->pagactual = $_GET['pagina_usuario'];
                } else {
                    $this->pagactual = 1;
                }
                $this->indice = ($this->pagactual - 1) * ($this->resultadoporpag);
            }
        }elseif ($this->tabla == 'entradas') {
            if (isset($_GET['pagina_entradas'])) {
                //COMPROBAR SI ES VALIDA LA PAGINA
                if (is_numeric($_GET['pagina_entradas'])) {
                    $this->pagactual = $_GET['pagina_entradas'];
                } else {
                    $this->pagactual = 1;
                }
                $this->indice = ($this->pagactual - 1) * ($this->resultadoporpag);
            }
        }
    }

    function mostrar()
    {
        try {
            if ($this->tabla == 'pelicula' || $this->tabla == 'pelicula_admin') {
                $stmt = $this->conexion->prepare("SELECT DISTINCT id_pelicula, nombre,imagen,sinopsis,duracion, url, clasificacion,categoria, fecha_estreno FROM pelicula ORDER BY fecha_estreno DESC, id_pelicula ASC LIMIT $this->indice, $this->resultadoporpag;");
            } elseif ($this->tabla == 'sala') {
                $stmt = $this->conexion->prepare("SELECT DISTINCT id_sala,descripcion,capacidad,habilitada,luxury FROM sala ORDER BY id_sala LIMIT $this->indice, $this->resultadoporpag;");
            } elseif ($this->tabla == 'usuario') {
                $stmt = $this->conexion->prepare("SELECT DISTINCT id_usuario,nombre,apellido,correo,contrasena,rol FROM usuario ORDER BY id_usuario LIMIT $this->indice, $this->resultadoporpag;");
            }elseif ($this->tabla == 'entradas') {
                $stmt = $this->conexion->prepare("SELECT reserva.id_sala as sala, pelicula.nombre as pelicula ,reserva.precio as precio ,horario.fecha as dia ,horario.hora as hora ,butaca.columna as columna,butaca.fila as fila,usuario.nombre as usuario FROM reserva INNER JOIN horario ON reserva.id_horario = horario.id_horario INNER JOIN usuario ON reserva.id_usuario = usuario.id_usuario INNER JOIN butaca ON reserva.id_butaca = butaca.id_butaca INNER JOIN pelicula ON horario.id_pelicula = pelicula.id_pelicula ORDER BY usuario,sala,dia,hora LIMIT $this->indice, $this->resultadoporpag;");
            }

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
