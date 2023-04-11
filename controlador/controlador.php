<?php
include_once("../modelo/pelicula.php");
include_once("../modelo/horario.php");
include_once("../modelo/paginacion.php");

$peliculas = new Pelicula("", "", "", "", "", "", "", "", "");
$arraypeliculas = $peliculas->obtieneTodos();

$pagina = new Paginacion(4, "pelicula");
$arraypeliculaspaginado = $pagina->mostrar();
$num = $pagina->numeritos();


$horarios = new Horario("", "", "", "", "", "");


if(isset($_POST["pelicula"]) || isset($_POST["dia"])){
    if (isset($_POST["pelicula"])) {
        $id_pelicula = $_POST["pelicula"]-1;
        $arrayhorarios = $horarios->obtieneDeIDPelicula($id_pelicula+1);
        echo $id_pelicula;
        foreach ($arrayhorarios as $a) {
            $diasimple = $a["fecha"];
            $diaini = substr($diasimple, 8, 2);
            $diafin = substr($diasimple, 5, 2);
            $dia = $diaini . "/" . $diafin;
            $array[] = $dia;
        }
        $b = array_unique($array);
        $id_dia = array_shift($b);
        
    } elseif (isset($_POST["id_pelicula"])) {
        $id_pelicula = $_POST["id_pelicula"];
        $arrayhorarios = $horarios->obtieneDeIDPelicula($id_pelicula+1);
    }
    if (isset($_POST["dia"])) {
        $id_pelicula = $_POST["id_pelicula"];
        $id_dia = $_POST["dia"];
        $arrayhorarios = $horarios->obtieneDeIDPelicula($id_pelicula+1);
    }
    
    require_once("../vista/pelicula.php");
}else{
    require_once("../vista/index.php");
}
