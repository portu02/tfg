<?php
session_start();

include_once("modelo/pelicula.php");
include_once("modelo/horario.php");
include_once("modelo/paginacion.php");
include_once("modelo/sala.php");
include_once("modelo/butaca.php");

//creacion de todas las peliculas 
    $peliculas = new Pelicula("", "", "", "", "", "", "", "", "");
    $arraypeliculas = $peliculas->obtieneTodos();
//creacion de horarios
    $horarios = new Horario("", "", "", "", "", "");
//creacion de horarios
    $butacas = new Butaca("", "", "", "", "", "");
//creacion de sala
    $sala = new Sala("", "", "", "", "", "");
    $arraysalas = $sala->obtieneTodos();
//creacion de paginacion
    $pagina = new Paginacion(4, "pelicula");
    $arraypeliculaspaginado = $pagina->mostrar();
    $num = $pagina->numeritos();
    
//si interactua con alguna pelicula o el dia
if(isset($_POST["pelicula"]) || isset($_POST["dia"]) || isset($_POST["pelicula_admin"]) || isset($_POST["borrar_peli"])){
    require_once("controlador/controlador_peliculas.php");

//si interactua con la hora
} elseif(isset($_POST["sala"]) || isset($_POST["hora"]) || isset($_POST["borrar"])){
    require_once("controlador/controlador_sala.php");

}elseif(isset($_POST['nueva']) || isset($_POST["editar_sala"]) || isset($_POST["limpiar"]) || isset($_POST["enviar_sala"])){
    require_once("controlador/controlador_admin.php");

} /*elseif(isset($_POST["nav"])){
    require_once("vista/vista_admin.php");
}*/ else{
    require_once("vista/principal.php");
}

