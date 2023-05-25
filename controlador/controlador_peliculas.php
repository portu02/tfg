<?php
if (isset($_POST["buscar_pelicula"])) {
    if (isset($_POST["buscar"])) {
        $arrayfiltrado = $peliculas->buscar($_POST['categoria'], $_POST['clasificacion'], $_POST['hora'], $_POST['fecha'], $_POST['buscador']);
        $categoria = $_POST['categoria'];
        $clasificacion = $_POST['clasificacion'];
        $hora = $_POST['hora'];
        $fecha = $_POST['fecha'];
        $buscador = $_POST['buscador'];
    }
    if (!isset($categoria)) {
        $categoria = '';
    }
    if (!isset($clasificacion)) {
        $clasificacion = '';
    }
    if (!isset($hora)) {
        $hora = '';
    }
    if (!isset($fecha)) {
        $fecha = '';
    }
    if (!isset($buscador)) {
        $buscador = '';
    }
    require_once('vista/pelicula/buscar_pelicula.php');
} else {
    if (isset($_POST["pelicula"])) {
        // mostramos los horarios de la pelicula selcionada
        $id_pelicula = $_POST["pelicula"];
        
        $arrayhorarios = $horarios->obtieneDeIDPelicula($id_pelicula);

        //CREAR HORARIO
        require_once('./controlador/crear_horario.php');

        //Si no existe horarios te devuelve al index
        if (count($arrayhorarios) <= 0) {
            echo "<script>alert('De momento esta pelicula no dispone de horarios');</script>";
            require_once('vista/principal.php');
        } else {
            foreach ($arrayhorarios as $a) {
                //contiene la informacion de horarios
                $diasimple = $a["fecha"];
                $diaini = substr($diasimple, 8, 2);
                $diafin = substr($diasimple, 5, 2);
                $dia = $diaini . "/" . $diafin;
                $array[] = $dia;
            }
            // para que no salgan horarios duplicados
            $b = array_unique($array);
            $id_dia = array_shift($b);

            $pelicula = $pelicula_objt->obtieneDeID($id_pelicula);

            $comentarios = $comentario->obtieneDeIDPelicula($id_pelicula);
            require_once("vista/pelicula/pelicula.php");
        }
    } elseif (isset($_POST["id_pelicula"])) {
        $id_pelicula = $_POST["id_pelicula"];
        $arrayhorarios = $horarios->obtieneDeIDPelicula($id_pelicula);
        $pelicula = $pelicula_objt->obtieneDeID($id_pelicula);
        $comentarios = $comentario->obtieneDeIDPelicula($id_pelicula);
    }
    if (isset($_POST["dia"])) {
        $id_pelicula = $_POST["id_pelicula"];
        $id_dia = $_POST["dia"];
        $arrayhorarios = $horarios->obtieneDeIDPelicula($id_pelicula);
        $pelicula = $pelicula_objt->obtieneDeID($id_pelicula);
        $comentarios = $comentario->obtieneDeIDPelicula($id_pelicula);
        require_once("vista/pelicula/pelicula.php");
    }
}
