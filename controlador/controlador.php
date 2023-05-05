<?php
session_start();

include_once("modelo/pelicula.php");
include_once("modelo/horario.php");
include_once("modelo/paginacion.php");
include_once("modelo/sala.php");
include_once("modelo/butaca.php");
include_once("modelo/usuario.php");

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
//creacion de usuarios
$usuario = new Usuario("", "", "", "", "", "");
$arrayusuarios = $usuario->obtieneTodos();
//creacion de paginacion
$pagina = new Paginacion(4, "pelicula");
$arraypeliculaspaginado = $pagina->mostrar();
$num = $pagina->numeritos();

//si interactua con alguna pelicula o el dia
if (isset($_POST["pelicula"]) || isset($_POST["dia"])) {
    require_once("controlador/controlador_peliculas.php");

    //si interactua con la hora
} elseif (isset($_POST["pelicula_admin"]) || isset($_POST["borrar_peli"]) || isset($_POST["nueva_pelicula"]) || isset($_POST["editar_pelicula"])){
    require_once("controlador/admin/controlador_admin_peliculas.php");   
}
//admin sala 
elseif(isset($_POST["sala_admin"]) || isset($_POST["editar_sala_admin"]) || isset($_POST["editar_sala"]) || isset($_POST["anadir_sala_admin"]) || isset($_POST["borrar_sala_admin"]) || isset($_POST["previsualizar"]) || isset($_POST["enviar_sala"])){
    require_once("controlador/admin/controlador_admin_salas.php");
}
elseif (isset($_POST["sala"]) || isset($_POST["hora"])) {
    require_once("controlador/controlador_sala.php");
} 
elseif (isset($_POST["usuario_admin"])  || isset($_POST["borrar_usuario_admin"]) || isset($_POST["nuevo_usuario_admin"]) | isset($_POST["editar_usuario_admin"])) {
    require_once("controlador/admin/controlador_admin_usuarios.php");
} 
elseif(isset($_POST["iniciar_sesion"]) || isset($_POST["acceder_login"]) || isset($_POST["volver_login"]) || isset($_POST["crear_login"]) || isset($_POST['registar_nuevo_login'])){
    require_once("controlador/controlador_login.php");
}
else {
    require_once("vista/principal.php");
}
