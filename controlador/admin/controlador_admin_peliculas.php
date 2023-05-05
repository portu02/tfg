<?php
if (isset($_POST['borrar_peli'])) {
    $id_pelicula = $_POST['id_pelicula_a'];
    $peliculas->borrar($id_pelicula);
    $result = 'Pelicula borrada correctamente';
    $arraypeliculas = $peliculas->obtieneTodos();
}
if (isset($_POST['nueva_pelicula']) || isset($_POST['editar_pelicula'])) {
    if (isset($_POST['id_pelicula'])) {
        $id_pelicula = $_POST['id_pelicula'];
        $nombre = $_POST['nombre'];
        $imagen = $_POST['imagen'];
        $sinopsis = $_POST['sinopsis'];
        $duracion = $_POST['duracion'];
        $url = $_POST['url'];
        $clasificacion = $_POST['clasificacion'];
        $categoria = $_POST['categoria'];
        $fecha_estreno = $_POST['fecha_estreno'];
    }
    require 'vista/pelicula/crear_pelicula.php';
} else {
    require_once("vista/pelicula/pelicula_admin.php");
}
