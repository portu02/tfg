<?php
if (isset($_POST["buscar_pelicula"])) {
    if (isset($_POST["buscar"])) {
        $buscador = '%' . $_POST['buscador']. '%';
        $arrayfiltrado = $peliculas->buscar($_POST['categoria'], $_POST['clasificacion'], $_POST['hora'], $_POST['fecha'], $buscador);
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
        $id_pelicula = $_POST["pelicula"] - 1;
        $arrayhorarios = $horarios->obtieneDeIDPelicula($id_pelicula + 1);

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
    } elseif (isset($_POST["id_pelicula"])) {
        $id_pelicula = $_POST["id_pelicula"];
        $arrayhorarios = $horarios->obtieneDeIDPelicula($id_pelicula + 1);
    }
    if (isset($_POST["dia"])) {
        $id_pelicula = $_POST["id_pelicula"];
        $id_dia = $_POST["dia"];
        $arrayhorarios = $horarios->obtieneDeIDPelicula($id_pelicula + 1);
        require_once("vista/pelicula/pelicula.php");
    } else {
        require_once("vista/pelicula/pelicula.php");
    }
}
