<?php
if (isset($_POST['borrar_peli'])) {
    $id_pelicula = $_POST['id_pelicula_a'];
    $peliculas->borrar($id_pelicula);
    $result = 'Pelicula borrada correctamente';
    $arraypeliculas = $peliculas->obtieneTodos();
}
if (isset($_POST['nueva_pelicula']) || isset($_POST['editar_pelicula']) || (isset($_POST['enviar_pelicula']))) {
    require_once('controlador/crear_pelicula.php');
}
else {
    require_once("vista/pelicula/pelicula_admin.php");
}

